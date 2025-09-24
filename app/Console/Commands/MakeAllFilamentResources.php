<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use ReflectionClass;

class MakeAllFilamentResources extends Command
{
    protected $signature = 'make:all-filament-resources';
    protected $description = 'Generate Filament resources for all models in App\Models';

    public function handle()
    {
        $modelsPath = app_path('Models');
        $this->generateResourcesRecursively($modelsPath);

        $this->info('All Filament resources generated!');
    }

    protected function generateResourcesRecursively($path, $namespace = 'App\\Models')
    {
        $files = File::files($path);
        $directories = File::directories($path);

        foreach ($files as $file) {
            $modelName = pathinfo($file->getFilename(), PATHINFO_FILENAME);
            $modelClass = $namespace . '\\' . $modelName;

            // Ensure the class is loaded
            if (!class_exists($modelClass)) {
                require_once $file->getPathname();
            }
            if (!class_exists($modelClass)) continue;

            $reflection = new ReflectionClass($modelClass);

            // Skip abstract classes or pivot models
            if ($reflection->isAbstract() || Str::contains($reflection->getName(), 'Pivot')) {
                continue;
            }

            // Detect soft deletes
            $softDeletes = in_array('Illuminate\\Database\\Eloquent\\SoftDeletes', class_uses_recursive($modelClass));

            $modelInstance = new $modelClass;

// Detect title attribute
            $titleAttribute = null;
            $tableColumns = $modelInstance->getConnection()
                ->getSchemaBuilder()
                ->getColumnListing($modelInstance->getTable());

            if (in_array('name', $tableColumns)) {
                $titleAttribute = 'name';
            } elseif (in_array('title', $tableColumns)) {
                $titleAttribute = 'title';
            }


            $this->info("Generating Filament resource for: $modelName");

            $params = [
                0 => $modelName,                 // Resource name
                '--model' => $modelClass,
                '--generate' => true,
                '--view' => true,
                '--soft-deletes' => $softDeletes,
                '--quiet' => true,               // prevent interactive prompts
            ];

            if ($titleAttribute) {
                $params['--title'] = $titleAttribute;
            }

            Artisan::call('make:filament-resource', $params);

            $this->info("Resource for $modelName created!");
        }

        // Recurse into subdirectories
        foreach ($directories as $dir) {
            $subNamespace = $namespace . '\\' . basename($dir);
            $this->generateResourcesRecursively($dir, $subNamespace);
        }
    }
}
