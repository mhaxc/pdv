<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriaRequest;
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
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriaRequest $request)
    {
        Categoria::create($request->all());
        return redirect()->route('categorias.index')->with('success', 'categoria criado com sucesso');
    }


    public function update(StoreCategoriaRequest $request, Categoria $categoria)
    {

        $categoria->update($request->all());
        return redirect()->route('categorias.index')->with('success', 'atualizado criado com sucesso');;
    }


    /**
     * Remove the specified resource from storage.
     */
     public function destroy (Categoria $categoria)
     {
       $categoria->delete();
      return redirect()->route('categorias.index')->with('success', 'Deletado com sucesso');;
    }
}
