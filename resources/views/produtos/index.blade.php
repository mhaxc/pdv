@extends('layouts.app')

@section('body')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Lista de Produtos</h1>
    <a href="{{ route('produtos.create') }}" class="btn btn-primary">Adicionar Produto</a>
</div>
<hr />
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif
<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>NOME</th>
            <th>PREÇO</th>
            <th>ESTOQUE</th>
            <th>DESCRIÇAO</th>
            <th>AÇAO</th>
        </tr>
    </thead>
    <tbody>
        @if($produtos->count() > 0)
        @foreach($produtos as $produto)
        <tr>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $produto->nome }}</td>
            <td class="align-middle">R$ {{ $produto->preco }}</td>
            <td class="align-middle">{{ $produto->estoque }}</td>
            <td class="align-middle">{{ $produto->descricao }}</td>
            <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('produtos.show', $produto->id) }}" type="button" class="btn btn-secondary">Mostrar</a>
                    <a href="{{ route('produtos.edit', $produto->id)}}" type="button" class="btn btn-warning">Editar</a>
                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Apagar esse Produto?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger m-0">Apagar</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td class="text-center" colspan="5">Produtos nao Encontrado</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection
