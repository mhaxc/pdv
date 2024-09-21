@extends('layouts.app')

@section('body')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Lista de Clientes</h1>
    <a href="{{ route('clientes.create') }}" class="btn btn-primary">Adicionar Clientes</a>
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
            <th>TELEFONE</th>
            <th>ENDEREÇO</th>
            <th>AÇAO</th>
        </tr>
    </thead>
    <tbody>
        @if($clientes->count() > 0)
        @foreach($clientes as $clientes)
        <tr>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $clientes->nome }}</td>
            <td class="align-middle">{{ $clientes->telefone }}</td>
            <td class="align-middle">{{ $clientes->endereco }}</td>

            <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('clientes.show', $clientes->id) }}" type="button" class="btn btn-secondary">Mostrar</a>
                    <a href="{{ route('clientes.edit', $clientes->id)}}" type="button" class="btn btn-warning">Editar</a>
                    <form action="{{ route('clientes.destroy', $clientes->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Apagar Esse Cliente ?')">
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
            <td class="text-center" colspan="5">Cliente nao Encontrado</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection
