@extends('layouts.app')

@section('body')
<h1 class="mb-0">Adicionar clientes</h1>
<hr />
<form action="{{ route('clientes.store') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="nome" class="form-control" placeholder="Nome do cliente">
        </div>
        <div class="col">
            <input type="text" name="telefone" class="form-control" placeholder="telefone">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="endereco" class="form-control" placeholder="endereco">
        </div>

    </div>
    <div class="row">
        <div class="d-grid">
            <button class="btn btn-primary">Salvar</button>
        </div>
    </div>
</form>
@endsection
