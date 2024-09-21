<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\VendaItem;
use App\Models\Produto;
use App\Models\Cliente;
use PDF;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendas = Venda::with('cliente')->get();
        return view('vendas.index', compact('vendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('vendas.create', compact('clientes', 'produtos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $venda = new Venda();
        $venda->cliente_id = $request->cliente_id;
        $venda->total = 0;  // Inicializa o total da venda
        $venda->save();

        $totalVenda = 0;

        foreach ($request->produtos as $produtoData) {
            $produto = Produto::find($produtoData['produto_id']);
            $quantidade = $produtoData['quantidade'];
            $preco = $produto->preco;
            $totalProduto = $preco * $quantidade;

            $vendaProduto = new VendaItem();
            $vendaProduto->venda_id = $venda->id;
            $vendaProduto->produto_id = $produto->id;
            $vendaProduto->quantidade = $quantidade;
            $vendaProduto->preco = $preco;
            $vendaProduto->save();

            $totalVenda += $totalProduto;
        }

        $venda->total = $totalVenda;
        $venda->save();

        return redirect()->route('vendas.index')->with('success', 'Venda registrada com sucesso!');


    }


    public function show(Venda $venda)
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('vendas.show', compact('venda', 'clientes', 'produtos'));

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venda $venda)
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('vendas.edit', compact('venda', 'clientes', 'produtos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venda $venda)
    {
        $produto = Produto::find($request->produto_id);
        $total = $produto->preco * $request->quantidade;

        $venda->update([
            'cliente_id' => $request->cliente_id,
            'produto_id' => $request->produto_id,
            'quantidade' => $request->quantidade,
            'total' => $total,
        ]);

        return redirect()->route('vendas.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $venda = Venda::findOrFail($id);

        $venda->delete();

        return redirect()->route('vendas.index')->with('success', 'venda  deletada com sucesso');
    }



    public function generatePDF($id)
    {
        $venda = Venda::with('cliente', 'items.produto')->findOrFail($id);
        $pdf = PDF::loadView('vendas.pdf', compact('venda'));
        return $pdf->download('venda_' . $venda->id . '.pdf');
    }
}
