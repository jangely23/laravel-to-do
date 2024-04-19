<?php

use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodosController::class, 'index'])->name('nombre-todos');

Route::post('/', [TodosController::class, 'store'])->name('nombre-todos');

Route::get('/{$id}', [TodosController::class, 'show'])->name('edit-todos');

Route::patch('/', [TodosController::class, 'store'])->name('update-todos');

Route::delete('/', [TodosController::class, 'store'])->name('destroy-todos');
