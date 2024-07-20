<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\TaskController;
use App\Models\Label;
use App\Models\Task;

Route::post('/label', [LabelController::class, 'store'])->name('label.store');
Route::delete('/label/{id}', [LabelController::class, 'destroy'])->name('label.destroy');
Route::put('/label/{id}', [LabelController::class, 'update'])->name('label.update');

// Usa esta ruta para mostrar la vista y asegúrate de que el método index en LabelController maneje la lógica para mostrar la vista
Route::get('/label', [LabelController::class, 'index'])->name('label');
Route::get('/task', [TaskController::class, 'indexlabel'])->name('task');
Route::post('/task', [TaskController::class, 'store'])->name('task.store');

Route::get('/', function () {
    $tasks = Task::with('label')->get(); // Obtener todas las tareas con su etiqueta

    $tasksArray = $tasks->map(function ($task) {
        // Convertir cada tarea a un array y personalizar la salida
        return [
            'id' => $task->id,
            'name' => $task->name,
            'status' => $task->status,
            'label_name' => $task->label ? $task->label->name : null,  // Asegurar que la tarea tiene una etiqueta
            // Puedes añadir más campos según sea necesario
        ];
    });

    return view('tasklist', compact('tasksArray'));
})->name('home');

Route::put('/taskslist/{id}', [TaskController::class, 'completeTask'])->name('task.update');

Route::delete('/taskslist/{id}', [TaskController::class, 'destroy'])->name('task.destroy');