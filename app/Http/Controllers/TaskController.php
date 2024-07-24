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
            'label_id' => 'required'
        ];
        
        $messages = [
            'nombre.string' => 'El campo nombre debe ser un texto',
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.unique' => 'La etiqueta ya existe',
            'nombre.min' => 'El campo nombre debe tener al menos 3 caracteres',
            'nombre.max' => 'El campo nombre debe tener como máximo 50 caracteres',
            'label_id.required' => 'Seleciona una etiqueta'
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

    public function index()
    {
        $tasks = Task::with('label')->get();

        return view('tasklist', compact('tasks'));
    }

    public function destroy($id){
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('home') -> with('Success', 'Tarea eliminada con éxito');
    }

    public function completeTask($id){
        $task = Task::find($id);
        $task->update([
            'status' => 'Completada'
        ]);

        return redirect()->route('home') -> with('Success', 'Tarea completada con éxito');
    }


}


