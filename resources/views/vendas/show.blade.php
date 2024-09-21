@extends('layouts.app')

@section('body')
<div class="container">
    <h1>Detalhes do Pedido #{{ $venda->id }}</h1>

    <div class="mb-3">
        <strong>Cliente:</strong> {{ $venda->cliente->nome }}
    </div>

    <div class="mb-3">
        <strong>Total:</strong> R$ {{ number_format($venda->total, 2, ',', '.') }}
    </div>

    <h3>Produtos:</h3>
    <ul>
        <div>

            @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}" {{ $venda->produto_id == $produto->id ? 'selected' : '' }}>

                {{ $produto->nome }} =
                {{ number_format($produto->preco, 2, ',', '.')}}

            </option>
            @endforeach

        </div>

    </ul>
    <br />

    <a href="{{ route('vendas.index') }}" class="btn btn-primary">Voltar</a>
</div>
@endsection
