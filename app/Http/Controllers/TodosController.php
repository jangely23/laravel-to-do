<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * index para mostrar todos los elementos
     * store para guardar una tarea
     * update para actualizar una tarea
     * destroy para eliminar una tarea
     * edit para mostrar el formulario de edicion
     */

    public function index(){
        $todos = Todo::all();
        return view('tareas.index', [ 'tareas' => $todos ]);
    }

    public function store(Request $request){

        // Valida que los campos esten bien
        $request->validate([
            'title' => 'required|min:4'
        ]);

        $todo = new Todo();
        $todo->title = $request->title;
        $todo->save();

        return redirect()->route('nombre-todos')->with('success', 'Tarea creada correctamente!');
    }

    public function show($id){
        $todo = Todo::find($id);
        return view('tareas.show', [ 'tarea' => $todo ]);
    }

    public function update(Request $request, $id){
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->save();

        /* dd($todo); */// permite hacer debug

        return redirect()->route('nombre-todos')->with('success', 'Tarea actualizada!');
    }

    public function destroy($id){
        $todo = Todo::find($id);
        $todo->delete();

        return redirect()->route('nombre-todos')->with('success', 'Tarea eliminada exitosamente!');
    }
}
