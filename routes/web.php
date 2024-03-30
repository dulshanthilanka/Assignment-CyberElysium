<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;

Route::get('/', [HomeController::class, 'index'])->name('Dashboard');

Route::prefix('/todos')->group(function () {
    Route::get('/', [TodoController::class, 'index'])->name('todos.index');
    Route::post('/store', [TodoController::class, 'store'])->name('todos.store');
    Route::get('/{task_id}/delete', [TodoController::class, 'delete'])->name('todos.delete');
});

require __DIR__.'/auth.php';
