@extends('layouts.app')

@section('body')
<h1>Editar Venda</h1>

<form action="{{ route('vendas.update', $venda->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="cliente_id">CLIENTE:</label>
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="cliente_id" id="cliente_id">
            @foreach ($clientes as $cliente)
            <option value="{{ $cliente->id }}" {{ isset($venda) && $venda->cliente_id == $cliente->id ? 'selected' : '' }}>
                {{ $cliente->nome }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="produto_id">PRODUTO:</label>
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="produto_id" id="produto_id">
            @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}" {{ $venda->produto_id == $produto->id ? 'selected' : '' }}>
                {{ $produto->nome }} =
                {{ number_format($produto->preco, 2, ',', '.')}}
            </option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="quantidade">QUANTIDADE:</label>
        <input class="form-control" type="number" name="quantidade" id="quantidade" value="{{ $venda->quantidade}}">
    </div>
    <br />
    <button type="submit" class="btn btn-primary">Atualizar</button>
    <br />

    <a href="{{ route('vendas.index') }}" class="btn btn-primary">Voltar à lista</a>
</form>


@endsection
