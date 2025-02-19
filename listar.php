<?php

$action = 'readAll';
require 'entrada_controller.php';

?>



<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Estoque DTI - Página Inicial</title>
</head>

<body>

    <!--Cabeçalho e Barra Superior-->
    <nav class="navbar navbar-expand-sm navbar-nav " id="upbar">
        <div class="container">
            <a href="">
                <img src="img/logo.jpg">
                <h4 class="d-inline" id="logoname">Hardware - Sistema de Estoque CMRJ</h4>
            </a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item ">
                        <a href="#" class="nav-link text-white">Sair</a>
                    </li>
            </div>
        </div>
        </div>
    </nav>

    <!--Corpo do Site -->
    <!-- Links Laterais -->
    <section id="home">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item ">
                            <a href="entrada.php">Entrada Patrimônio</a>
                        </li>
                        <li class="list-group-item ">
                            <a href="saida.php">Saída Patrimônio</a>
                        </li>
                        <li class=" list-group-item ">
                            <a href="listar.php">Listar Estoque </a>
                        </li>

                    </ul>

                </div>
                <!--Formulários -->
                <div class="col-md-9">
                    <div class="container pagina">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Listagem de Patrimônio</h4>
                                <hr />

                                <div class="d-flex pt-5 ">
                                    <div class="ml-auto">
                                        <input type="text" class="form-control" placeholder="buscar patrimônio"
                                            id="search" />
                                    </div>
                                    <button id="search-button" type="button" class="btn btn-primary">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>

                                <table class="table table-striped mt-3">
                                    <tr>
                                        <th>Equipamento</th>
                                        <th>Patrimônio</th>
                                        <th>Entregue Por:</th>
                                        <th>Data da Entrega</th>
                                    </tr>

                                    <?php foreach ($listagem as $index => $item) { ?>

                                        <tr>
                                            <td><?= $item->equipamento ?></td>
                                            <td><?= $item->patrimonio ?></td>
                                            <td><?= ucfirst($item->responsavel) ?></td>
                                            <td><?= implode("/", array_reverse(explode("-", $item->data_entrada))) ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>




                            </div>
                        </div>
                    </div>

                </div>
            </div>



        </div>


    </section>




</body>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

<script type="text/javascript" src="https://example.com/fontawesome/v6.6.0/js/conflict-detection.js"></script>
</body>

</html>