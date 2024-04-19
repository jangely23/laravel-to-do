<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodosController::class, 'index'])->name('nombre-todos');

Route::post('/', [TodosController::class, 'store'])->name('nombre-todos');

Route::get('/{id}', [TodosController::class, 'show'])->name('edit-todos');

Route::patch('/{id}', [TodosController::class, 'update'])->name('update-todos');

Route::delete('/{id}', [TodosController::class, 'destroy'])->name('destroy-todos');

Route::resource('categorias', CategoriaController::class);
