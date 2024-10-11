@extends('layouts.app')

@section('title', 'Categorias')

@section('body')

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif


<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Lista de categoria</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Adicionar Categoria</button>
</div>
<hr />
<!-- Modal de Adição -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('categorias.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Adicionar Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<table class="table table-hover">
    <thead class="table-primary">

        <tr>
            <th>NOME</th>
            <th>ACÕES</th>
        </tr>
    </thead>
    <tbody>
        @if($categorias->count() > 0)
        @foreach($categorias as $categoria)
        <tr>

            <td class="align-middle">{{ $categoria->nome }}</td>
            <td>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $categoria->id }}">Editar</button>



                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Apagar Esse Categoria ?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger m-0">Apagar</button>
                    </form>
                </form>
            </td>
        </tr>

        <!-- Modal de Edição -->
        <div class="modal fade" id="editModal{{ $categoria->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Editar Categoria</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" class="form-control" value="{{ $categoria->nome }}" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <tr>
            <td class="text-center" colspan="5"> Categoria nao Encontrado</td>
        </tr>
        @endif
    </tbody>

</table>
@endsection
