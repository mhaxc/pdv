<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Area e Brita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>

    @include('layouts.navbar')


    <div class="container py-5">


        @yield('body')
        <div class="container mt-5">
            <div class="row">
                <!-- Card para Produtos -->
                <div class="col-md-4">
                    <div class="card text-center bg-primary text-white">
                        <div class="card-body">
                            <h5 class="card-title">Produtos</h5>
                            <p class="card-text display-4">{{ $totalProdutos }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card para Clientes -->
                <div class="col-md-4">
                    <div class="card text-center bg-success text-white">
                        <div class="card-body">
                            <h5 class="card-title">Clientes</h5>
                            <p class="card-text display-4">{{ $totalClientes }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card para Vendas -->
                <div class="col-md-4">
                    <div class="card text-center bg-warning text-white">
                        <div class="card-body">
                            <h5 class="card-title">Vendas</h5>
                            <p class="card-text display-4">{{ $totalVendas }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS (Opcional) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>


</html>
