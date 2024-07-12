<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Request $request){
        $rules = [
            'nombretarea' => 'required|string|min:3|max:50|unique:labels,name',
        ];
        
        $messages = [
            'nombre.string' => 'El campo nombre debe ser un texto',
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.unique' => 'La etiqueta ya existe',
            'nombre.min' => 'El campo nombre debe tener al menos 3 caracteres',
            'nombre.max' => 'El campo nombre debe tener como máximo 50 caracteres',
        ];
        
        $request->validate($rules, $messages);
        

        $task = new Task;
        $task->name = $request->nombretarea;
        $task->label_id = $request->label_id;
        $task->save();


        return redirect()->route('task') -> with('Success', 'Tarea creada con éxito');
    }

    public function indexlabel(){
        $tasks = Task::all();
        $labels = Label::all();
        
        return view('task', compact('tasks', 'labels'));
    }

    public function index(){
        $tasks = Task::with('label')->get(); // Obtener todas las tareas con su etiqueta

        $tasksArray = $tasks->map(function ($task) {
            // Convertir cada tarea a un array y personalizar la salida
            return [
                'id' => $task->id,
                'name' => $task->name,
                'description' => $task->description,
                'label_name' => $task->label ? $task->label->name : null,  // Asegurar que la tarea tiene una etiqueta
                // Puedes añadir más campos según sea necesario
            ];
        });

        return view('tasklist', compact('tasksArray'));
    }

    public function destroy($id){
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('home') -> with('Success', 'Tarea eliminada con éxito');
    }
}
