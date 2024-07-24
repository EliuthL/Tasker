<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\TaskController;
Route::post('/label', [LabelController::class, 'store'])->name('label.store');
Route::delete('/label/{id}', [LabelController::class, 'destroy'])->name('label.destroy');
Route::put('/label/{id}', [LabelController::class, 'update'])->name('label.update');

Route::get('/label', [LabelController::class, 'index'])->name('label');
Route::get('/task', [TaskController::class, 'indexlabel'])->name('task');
Route::post('/task', [TaskController::class, 'store'])->name('task.store');


Route::get('/', [TaskController::class, 'index'])->name('home');

Route::put('/taskslist/{id}', [TaskController::class, 'completeTask'])->name('task.update');

Route::delete('/taskslist/{id}', [TaskController::class, 'destroy'])->name('task.destroy');