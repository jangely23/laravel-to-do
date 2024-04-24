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
        Schema::table('todos', function (Blueprint $table) {
            $table->enum('status',['Pendiente', 'En proceso', 'Completada'])->default('Pendiente');

            //Crea una relacion entre tablas
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');    
           
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categorias');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('todos', function (Blueprint $table) {
            //
        });
    }
};
