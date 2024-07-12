<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Label;

class LabelController extends Controller
{

    public function store(Request $request){

        $rules = [
            'nombre' => 'required|string|min:3|max:50|unique:labels,name',
        ];
        
        $messages = [
            'nombre.string' => 'El campo nombre debe ser un texto',
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.unique' => 'La etiqueta ya existe',
            'nombre.min' => 'El campo nombre debe tener al menos 3 caracteres',
            'nombre.max' => 'El campo nombre debe tener como máximo 50 caracteres',
        ];
        
        $request->validate($rules, $messages);
        

        $label = new Label;
        $label->name = $request->nombre;
        $label->save();

        return redirect()->route('label') -> with('Success', 'Etiqueta creada con éxito');
    }

    public function destroy($id){
        $label = Label::find($id);
        $label->delete();
        return redirect()->route('label') -> with('Success', 'Etiqueta eliminada con éxito');
    }

    public function update(Request $request, $id){
        $rules = [
            'nombre' => 'required|string|min:3|max:50|unique:labels,name',
        ];
        
        $messages = [
            'nombre.string' => 'El campo nombre debe ser un texto',
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.unique' => 'La etiqueta ya existe',
            'nombre.min' => 'El campo nombre debe tener al menos 3 caracteres',
            'nombre.max' => 'El campo nombre debe tener como máximo 50 caracteres',
        ];
        
        $request->validate($rules, $messages);

        $label = Label::find($id);
        $label->name = $request->nombre;
        $label->save();

        return redirect()->route('label') -> with('Success', 'Etiqueta actualizada con éxito');
    }


    public function index(){
        $labels = Label::all();
        return view('label', compact('labels'));
    }
}
