<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('options', static function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id()->autoIncrement();
            $table->string('name');
            $table->string('keyword')->unique();
            $table->string('route');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('show_menu')->default(0);
            $table->integer('sort')->default(1);
            $table->integer('type')->default(1); //1 - Module, 2 - Group, 3 - Controller, 4 - Action, 5 - Permission
            $table->integer('id_parent')->nullable(true);
            $table->string('icon')->nullable(true);
            $table->string('description')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options');
    }
};
