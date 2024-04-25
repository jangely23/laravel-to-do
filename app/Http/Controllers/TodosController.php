<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\priorities;
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
        // se debe obtener de la sesion
        $user = include(resource_path('data\data.php'));
        
        $todos = Todo::where('user_id', $user['user1']['id'])
                        ->with('categorias', 'priorities')
                        ->orderBy('status')
                        ->orderBy('priority_id')
                        ->orderBy('category_id')
                        ->get();
        $categorias = Categoria::all();
        $prioridades = Priorities::all();

        if($todos->isEmpty()){
            $todos=false;
        }

        return view(
            'tareas.index', 
            [ 
              'tareas' => $todos, 
              'categorias' => $categorias, 
              'prioridades' => $prioridades, 
              'user' => (object)$user['user1'] 
            ]
        );
    }

    public function store(Request $request){

        // Valida que los campos esten bien
        $request->validate([
            'title' => 'required|min:4',
            'category_id' => 'integer',
            'priority_id' => 'integer|required',
            'user_id' => 'integer|required',
        ]);

        $todo = new Todo();
        $todo->title = $request->title;
        $todo->category_id = $request->category_id;
        $todo->priority_id = $request->priority_id;
        $todo->user_id = $request->user_id;
        $todo->save();

        return redirect()->route('nombre-todos')->with('success', 'Tarea creada correctamente!');
    }

    public function show($id){
        $todo = Todo::find($id);
        $categorias = Categoria::all();
        $prioridades = Priorities::all();

        return view(
            'tareas.show', 
            [ 
                'tarea' => $todo,
                'categorias' => $categorias, 
                'prioridades' => $prioridades
        ]);
    }

    public function update(Request $request, $id){
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->category_id = $request->category_id;
        $todo->priority_id = $request->priority_id;
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
