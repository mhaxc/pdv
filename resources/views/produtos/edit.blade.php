@extends('layouts.app')

@section('body')
<h1 class="mb-0">Editar Produtos</h1>
<hr />
<form action="{{ route('produtos.update', $produto->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="Title" value="{{ $produto->nome }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Preço</label>
            <input type="text" name="preco" class="form-control" placeholder="Preço" value="{{ $produto->preco }}">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">estoque</label>
            <input type="number" name="estoque" class="form-control" placeholder=" volume" value="{{ $produto->estoque }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="descricao" placeholder="Descriçao">{{ $produto->descricao }}</textarea>
        </div>

    </div>
    <div class="row">
        <div class="d-grid">
            <button class="btn btn-warning">Atualizar</button>
        </div>
    </div>


</form>
@endsection
