<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->integer('sort');
            $table->nestedSet();
            $table->timestamps();
        });

        Schema::create('car_category', function (Blueprint $table) {
            $table->foreignId('car_id')->references('id')->on('cars')->cascadeOnDelete();
            $table->foreignId('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->primary(['category_id', 'car_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
