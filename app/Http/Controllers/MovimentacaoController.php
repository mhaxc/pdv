<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Movimentacao;
use App\Http\Controllers\MovimentacoesExport;

use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{
    public function index()
    {
        $movimentacoes = Movimentacao::with('produto')->get();
        return view('movimentacoes.index', compact('movimentacoes'));
    }

    public function create()
    {
        $produtos = Produto::all();
        return view('movimentacoes.create', compact('produtos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required',
            'tipo' => 'required',
            'quantidade' => 'required|integer'
        ]);

        $movimentacao = Movimentacao::create($request->all());

        $produto = Produto::find($request->produto_id);
        if ($request->tipo == 'entrada') {
            $produto->quantidade += $request->quantidade;
        } else {
            $produto->quantidade -= $request->quantidade;
        }
        $produto->save();

        return redirect()->route('movimentacoes.index');
    }
    public function gerarRelatorioPdf()
    {
        $movimentacoes = Movimentacao::with('produto')->get();
        $pdf = PDF::loadView('relatorios.movimentacoes_pdf', compact('movimentacoes'));
        return $pdf->download('relatorio_movimentacoes.pdf');
    }

    public function gerarRelatorioExcel()
    {
        return Excel::download(new MovimentacoesExport, 'relatorio_movimentacoes.xlsx');
    }
}
