<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Cliente;
use App\Models\venda;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Contagem total de produtos, clientes e vendas (pedidos)
        $totalProdutos = Produto::count();
        $totalClientes = Cliente::count();
        $totalVendas = venda::count();

        // Retornar para a view com as contagens
        return view('welcome', compact('totalProdutos', 'totalClientes', 'totalVendas'));
    }
}
