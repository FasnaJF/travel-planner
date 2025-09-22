<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accommodation_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accommodation_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('description')->nullable(false);
            $table->decimal('price_per_night', 10, 2)->nullable(false);
            $table->integer('max_occupancy')->nullable(false);
            $table->boolean('pets_allowed')->default(false);
            $table->text('amenities')->nullable(); // Comma-separated list of amenities
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accommodation_types');
    }
};
