<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido #{{ $venda->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
            font-size: 12px;
            width: 100%;
            height: 10%;
        }

        h1 {
            text-align: center;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .logo {
            text-align: center;
            margin-bottom: 10px;


        }

        .logo img {
            max-width: 150px;
        }

        .info-section {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
            font-size: 12px;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .total {
            text-align: right;
            font-weight: bold;
            font-size: 14px;
            margin-top: 10px;
        }

        .container {
            width: 100%;
            height: 50%;
        }
    </style>
</head>

<body>

    <div class="container">


        <!-- Cabeçalho com o logo da empresa e informações da empresa -->
        <!-- Logo da Empresa -->
        <div class="logo">
            <img src="logo.jpg" alt="Logo da Empresa">
        </div>
        <div class="company-info">
            <p><strong>MAIK AREIA</strong></p>
            <p>Telefone: (27) 9 9996-9696 / 9 9800-4688</p>
        </div>
        <h1>Pedido #{{ $venda->id }}</h1>

        <!-- Informações do Pedido -->
        <div class="info-section">
            <table>
                <tr>
                    <th>Número do Pedido:</th>
                    <td>{{ $venda->id }}</td>
                </tr>
                <tr>
                    <th>Data:</th>
                    <td>{{ $venda->created_at->format('d/m/Y') }}</td>
                </tr>
            </table>
        </div>

        <!-- Informações do Cliente -->
        <div class="info-section">
            <table>
                <tr>
                    <th>Cliente:</th>
                    <td>{{ $venda->cliente->nome }}</td>
                </tr>
                <tr>
                    <th>Telefone:</th>
                    <td>{{ $venda->cliente->telefone }}</td>
                </tr>
                <tr>
                    <th>Endereço:</th>
                    <td>{{ $venda->cliente->endereco }}</td>
                </tr>
            </table>
        </div>

        <!-- Produtos do Pedido -->
        <div class="info-section">
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Qtd</th>
                        <th>Preço Unitário</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($venda->items as $item)
                    <tr>
                        <td>{{ $item->produto->nome }}</td>
                        <td>{{ $item->quantidade }}</td>
                        <td>R$ {{ number_format($item->preco, 2, ',', '.') }}</td>
                        <td>R$ {{ number_format($item->quantidade * $item->preco, 2, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Total do Pedido -->

        <div class="total">
            <p>Total: R$ {{ number_format($venda->total, 2, ',', '.') }}</p>
            <hr>

        </div>
        <h2>Assinatura cliente</h2>
    </div>

</body>

</html>
