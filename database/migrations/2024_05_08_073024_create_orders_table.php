<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('status')->default('Не оплачен');
            $table->timestamps();
        });

        Schema::create('car_order', function (Blueprint $table) {
            $table->foreignId('car_id')->references('id')->on('cars')->cascadeOnDelete();
            $table->foreignId('order_id')->references('id')->on('orders')->cascadeOnDelete();
            $table->unsignedInteger('count')->default(1);
            $table->unsignedInteger('cost');
            $table->primary(['order_id', 'car_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('car_order');
        
        Schema::dropIfExists('orders');
    }
};
