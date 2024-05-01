<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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

        $adminRoleId = DB::table('roles')->insertGetId(['name' => 'admin']);
        $adminUserId = DB::table('users')->insertGetId([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
        ]);

        DB::table('role_user')->insert(['user_id' => $adminUserId, 'role_id' => $adminRoleId]);
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');

        Schema::dropIfExists('role_user');
    }
};
