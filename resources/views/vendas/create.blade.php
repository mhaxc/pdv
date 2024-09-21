@extends('layouts.app')

@section('body')

<!-- resources/views/vendas/create.blade.php -->


<div class="container">
    <h1>Nova Venda</h1>
    <form action="{{ route('vendas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="cliente_id">Cliente:</label>
            <select name="cliente_id" class="form-control">
                @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>

        <h3>Adicionar Produtos</h3>
        <div id="produtos">
            <div class="form-group">
                <label for="produto_id">Produto:</label>
                <select name="produtos[0][produto_id]" class="form-control">
                    @foreach ($produtos as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->nome }} - R$ {{ $produto->preco }}</option>
                    @endforeach
                </select>

                <label for="quantidade">Quantidade(ex. 0.5 ou 1 )</label>
                <input type="text" name="produtos[0][quantidade]" class="form-control" required>
            </div>
        </div>
        <br />
        <button type="submit" class="btn btn-primary">Salvar Venda</button>
        <br />
        <br />
        <button type="button" id="addProduto" class="btn btn-success">Outro Produto</button>
        <br />
        <br />
        <a href="{{ route('vendas.index') }}" class="btn btn-danger">Voltar</a>

    </form>
</div>

<script>
    let index = 1;
    document.getElementById('addProduto').addEventListener('click', function() {
        const produtoDiv = document.createElement('div');
        produtoDiv.classList.add('form-group');

        produtoDiv.innerHTML = `
                <label for="produto_id">Produto:</label>
                <select name="produtos[${index}][produto_id]" class="form-control">
                    @foreach ($produtos as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->nome }} - R$ {{ $produto->preco }}</option>
                    @endforeach
                </select>

                <label for="quantidade">Quantidade(ex. 0.5 ou 1)</label>
                <input type="text" name="produtos[${index}][quantidade]" class="form-control" required>
            `;
        document.getElementById('produtos').appendChild(produtoDiv);
        index++;
    });
</script>

@endsection
