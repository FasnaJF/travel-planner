<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GenerateAllFilamentResources extends Command
{
    protected $signature = 'filament:generate-all-resources';
    protected $description = 'Generate Filament resources for all models.';

    public function handle()
    {
        $modelsPath = app_path('Models');
        $modelFiles = File::allFiles($modelsPath);

        foreach ($modelFiles as $modelFile) {
            $modelName = Str::beforeLast($modelFile->getFilename(), '.php');
            $modelClass = "App\\Models\\{$modelName}";

            // Check if the file is a valid model class
            if (class_exists($modelClass)) {
                $this->info("Generating resource for model: {$modelName}...");

                // This is the key line that calls the Artisan command
                $this->call('make:filament-resource', [
                    0 => $modelName,
                    '--generate' => true,
                ]);

                $this->info("Resource for {$modelName} created successfully.");
            }
        }

        $this->info('All Filament resources have been generated.');
        return 0;
    }
}