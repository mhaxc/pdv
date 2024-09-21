@extends('layouts.app')

@section('body')
<a href="{{ route('produtos.index') }}" class="btn btn-primary">Voltar</a>
<h1 class="mb-0">Detalhes do Produto</h1>
<hr />
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" placeholder="nome" value="{{ $produto->nome }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Preço</label>
        <input type="text" name="preco" class="form-control" placeholder="preco" value="{{ $produto->preco }}" readonly>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Volume</label>
        <input type="text" name="volume" class="form-control" placeholder="volume" value="{{ $produto->volume }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Descriçao</label>
        <textarea class="form-control" name="descricao" placeholder="Descricao" readonly>{{ $produto->descricao }}</textarea>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Criado </label>
        <input type="text" name="created_at" class="form-control" placeholder="Criado " value="{{ $produto->created_at }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Atualizado</label>
        <input type="text" name="updated_at" class="form-control" placeholder="Atualizado" value="{{ $produto->updated_at }}" readonly>
    </div>
</div>
@endsection
