<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return view('app');
})->name('inicio');

Route::get('/tareas', [TodosController::class, 'index'])->name('nombre-todos');

Route::post('/tareas', [TodosController::class, 'store'])->name('nombre-todos');

Route::get('/tareas/{id}', [TodosController::class, 'show'])->name('edit-todos');

Route::patch('/tareas/{id}', [TodosController::class, 'update'])->name('update-todos');

Route::delete('/tareas/{id}', [TodosController::class, 'destroy'])->name('destroy-todos');

Route::resource('categorias', CategoriaController::class);
