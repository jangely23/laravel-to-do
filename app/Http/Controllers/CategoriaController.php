<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        
        if($categorias->isEmpty()){
            $categorias=false;
        }

        return view('categorias.index', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categorias|max:255',
            'color' => 'required|max:7'
        ]);

        $categoria = new Categoria;
        $categoria->name = $request->name;
        $categoria->color = $request->color;
        $categoria->save();


        return redirect()->route('categorias.index')->with('success', 'Nueva categoria agregada!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::with('todos')->find($id);
       
        return view('categorias.show', ['categoria'=> $categoria]);
    }

    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = Categoria::find($id);
        $categoria->name = $request->name;
        $categoria->color = $request->color;
        $categoria->save();

        return redirect()->route('categorias.index')->with('success', 'Categoria actualizada!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria eliminada!');
    }
}
