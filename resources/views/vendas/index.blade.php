@extends('layouts.app')

@section('body')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Lista de vendas</h1>
    <a href="{{ route('vendas.create') }}" class="btn btn-primary">Nova Venda</a>
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
            <th>ID</th>
            <th>CLIENTE</th>
            <th>ENDERECO</th>
            <th>TOTAL</th>
            <th>DATA</th>
            <th>AÇOES</th>
        </tr>
    </thead>
    <tbody>
        @if($vendas->count() > 0)
        @foreach ($vendas as $venda)
        <tr>
            <td class="align-middle">{{ $venda->id }}</td>
            <td class="align-middle">{{ $venda->cliente->nome }}</td>
            <td class="align-middle">{{ $venda->cliente->endereco  }}</td>
            <td class="align-middle">R$ {{ number_format($venda->total, 2, ',', '.') }}</td>
            <td>{{ $venda->created_at->format('d/m/Y') }}</td>
            <td class="align-middle">

                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('vendas.show', $venda) }}" type="button" class="btn btn-secondary">Mostrar</a>
                    <!-- <a href="{{ route('vendas.edit', $venda)}}" type="button" class="btn btn-warning">Editar</a> -->
                    <form action="{{ route('vendas.destroy', $venda) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Apagar essa Venda?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger m-0">Apagar</button>
                    </form>
                    <a href="{{ route('vendas.pdf', $venda) }}" type="button" class="btn btn-success">PDF</a>
                </div>


            </td>

        </tr>
        @endforeach
        @else
        <tr>
            <td class="text-center" colspan="5">vendas nao Encontradas</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection
