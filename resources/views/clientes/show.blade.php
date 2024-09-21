@extends('layouts.app')

@section('body')

<h1 class="mb-0">Detalhes do Cliente</h1>
<a href="{{ route('clientes.index') }}" class="btn btn-primary">Voltar</a>
<hr />

<div class="row">
    <div class="col mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" placeholder="nome" value="{{ $cliente->nome }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Telefone</label>
        <input type="text" name="telefone" class="form-control" placeholder="Telefone" value="{{ $cliente->telefone }}" readonly>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Endereco</label>
        <input type="text" name="endereco" class="form-control" placeholder="Endereco" value="{{ $cliente->endereco }}" readonly>
    </div>

</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Criado</label>
        <input type="text" name="created_at" class="form-control" placeholder="Criado " value="{{ $cliente->created_at }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Atualizado</label>
        <input type="text" name="updated_at" class="form-control" placeholder="Atualizado" value="{{ $cliente->updated_at }}" readonly>
    </div>

</div>
@endsection
