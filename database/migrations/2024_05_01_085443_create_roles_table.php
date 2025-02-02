<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('role_user', function (Blueprint $table) {
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('role_id')->references('id')->on('roles')->cascadeOnDelete();
            $table->primary(['role_id', 'user_id']);
        });

        $role = Role::factory()->create(['name' => 'admin']);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
        ])->roles()->attach($role);
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');

        Schema::dropIfExists('role_user');
    }
};
