<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->id();

            $table->foreignId('sport_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('location');
            $table->text('description')->nullable();

            $table->integer('price_per_hour');

            $table->string('image')->nullable();

            $table->decimal('rating', 2, 1)
                ->default(0);

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('venues');
    }
};