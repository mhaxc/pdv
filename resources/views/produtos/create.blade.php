@extends('layouts.app')

@section('body')
<h1 class="mb-0">Adicionar produtos</h1>
<hr />
<form action="{{ route('produtos.store') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="nome" class="form-control" placeholder="Nome do Produto">
        </div>
        <div class="col">
            <input type="text" name="preco" class="form-control" placeholder="Preço">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <input type="number" name="estoque" class="form-control" placeholder="estoque">
        </div>



        <div class="col">
            <textarea class="form-control" name="descricao" placeholder="Descriçao "></textarea>
        </div>
    </div>
    <div class="row">
        <div class="d-grid">
            <button class="btn btn-primary">Salvar</button>
        </div>
    </div>
</form>
@endsection
