<!DOCTYPE html>
<html>

<head>
    <title>Relatório de Movimentações</title>
</head>

<body>
    <h1>Relatório de Movimentações</h1>
    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Tipo</th>
                <th>Quantidade</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movimentacoes as $movimentacao)
            <tr>
                <td>{{ $movimentacao->produto->nome }}</td>
                <td>{{ ucfirst($movimentacao->tipo) }}</td>
                <td>{{ $movimentacao->quantidade }}</td>
                <td>{{ $movimentacao->created_at->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
