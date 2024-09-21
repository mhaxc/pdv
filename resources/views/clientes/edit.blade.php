@extends('layouts.app')

@section('body')
<h1 class="mb-0">Editar Clientes</h1>
<hr />
<form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="Title" value="{{ $cliente->nome }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Preço</label>
            <input type="text" name="endereco" class="form-control" placeholder="Endereco" value="{{ $cliente->endereco }}">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">telefone</label>
            <input type="text" name="telefone" class="form-control" placeholder=" volume" value="{{ $cliente->telefone }}">
        </div>


    </div>
    <div class="row">
        <div class="d-grid">
            <button class="btn btn-warning">Atualizar</button>
        </div>
    </div>


</form>
@endsection
