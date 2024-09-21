<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest as RequestsProdutoRequest;
use Illuminate\Http\Request;
use Illuminate\Http\ProdutoRequest;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Produtos.create');
    }


    public function store(RequestsProdutoRequest $produtorequest)
    {
        Produto::create($produtorequest->all());

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produto::findOrFail($id);

        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Produto::findOrFail($id);

        return view('produtos.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestsProdutoRequest $produtorequest, string $id)
    {
        $produto = Produto::findOrFail($id);

        $produto->update($produtorequest->all());

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::findOrFail($id);

        $produto->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto deletado com sucesso');
    }

}
