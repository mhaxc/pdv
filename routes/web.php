<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\MovimentacaoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardController;



Route::resource('/produtos', ProdutoController::class);
Route::resource('/clientes', ClienteController::class);
Route::resource('vendas', VendaController::class);
Route::get('vendas/{venda}/pdf', [VendaController::class, 'generatePDF'])->name('vendas.pdf');
Route::get('/', [DashboardController::class, 'index'])->name('welcome');
Route::resource('categorias', CategoriaController::class);


Route::resource('movimentacoes', MovimentacaoController::class);

Route::get('/movimentacoes/relatorio-pdf', [MovimentacaoController::class, 'gerarRelatorioPdf'])->name('movimentacoes.pdf');
Route::get('/movimentacoes/relatorio-excel', [MovimentacaoController::class, 'gerarRelatorioExcel'])->name('movimentacoes.excel');
