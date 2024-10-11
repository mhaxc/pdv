<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest as RequestsProdutoRequest;
use Illuminate\Http\Request;
use Illuminate\Http\ProdutoRequest;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Fornecedor;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('categoria')->get();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'volume' => 'required',
            'estoque' => 'required',
            'preco' => 'required',
            'categoria_id' => 'required',
        ]);

        Produto::create($request->all());
        return redirect()->route('produtos.index');
    }



}
