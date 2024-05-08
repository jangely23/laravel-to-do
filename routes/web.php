<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\CategoriaController;

Route::get('/', [CategoriaController::class, 'index'])->name('inicio');

/* Route::get('/tareas',           [TodosController::class, 'index']  )->name('nombre-todos');
Route::post('/tareas',          [TodosController::class, 'store']  )->name('store-todos');
Route::get('/tareas/{id}',      [TodosController::class, 'show']   )->name('show-todos');
Route::patch('/tareas/{id}',    [TodosController::class, 'update'] )->name('update-todos');
Route::delete('/tareas/{id}',   [TodosController::class, 'destroy'])->name('destroy-todos');
 */
Route::resource('categorias', CategoriaController::class);

Route::resource('tareas', TodosController::class);

