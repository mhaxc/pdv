@extends('layouts.app')

@section('body')
<h1 class="mb-0">Adicionar produtos</h1>
<hr />
<form action="{{ route('produtos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Produto</label>
        <input type="text" name="nome" class="form-control" value="{{ $produto->nome ?? '' }}" required>
    </div>

    <div class="mb-3">
        <label for="categoria_id" class="form-label">Categoria</label>
        <select name="categoria_id" class="form-control" required>
            @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}" {{ isset($produto) && $produto->categoria_id == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nome }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="preco" class="form-label">Preço</label>
        <input type="number" name="preco" class="form-control" value="{{ $produto->preco ?? '' }}" required>
    </div>

    <div class="mb-3">
        <label for="estoque" class="form-label">Estoque</label>
        <input type="number" name="estoque" class="form-control" value="{{ $produto->estoque ?? '' }}" required>
    </div>
    <div class="mb-3">
        <label for="volume" class="form-label">volume</label>
        <input type="text" name="volume" class="form-control" value="{{ $produto->volume ?? '' }}" required>
    </div>

    <div class="input-group">
        <label for="descricao" class="form-label"> Descricao</label>
        <input type="textarea" name="descricao" class="form-control" value="{{ $produto->descricao ?? '' }}" required>
    </div>
    <br />
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
@endsection
