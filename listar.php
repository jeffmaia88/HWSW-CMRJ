<?php
session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
    header('location: index.php?login=error2');
}

$listagem = isset($_SESSION['listagem']) ? $_SESSION['listagem'] : [];
$busca = isset($_SESSION['search']) ? $_SESSION['search'] : [];

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

    <title>Estoque DTI - Listagem de Estoque</title>
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
                        <a href="logoff.php" class="nav-link text-white">Sair</a>
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
                            <a href="entrada.php">Entrada de Patrimônio</a>
                        </li>                       
                        <li class=" list-group-item ">
                            <a href="listar.php">Listagem de Estoque </a>
                        </li>
                        <li class="list-group-item ">
                            <a href="busca.php">Log de E/S</a>
                        </li>



                    </ul>

                </div>
                <!--Formulários -->
                <div class="col-md-9">
                    <div class="container pagina">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Listagem de Patrimônio
                                    <img src="img/list.png" class="pl-4 mb-2">
                                </h4>
                                <hr />

                                <div class="row">
                                    <div class="col-md-3 d-flex pt-5">
                                        <select class="custom-select inputs ml-auto" name="equipamento" id="equip"
                                            onchange="ListEquip()">
                                            <option selected>-- Selecione --</option>
                                            <option value="Todos">Todos</option>
                                            <option value="Computador">Computador</option>
                                            <option value="Monitor">Monitor</option>
                                            <option value="Notebook">Notebook</option>
                                            <option value="Impressora">Impressora</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5 ml-5 ">
                                        <form method="post" action="controller.php?action=read">
                                            <div class="d-flex pt-5 pl-5">
                                                <div class="pl-5">
                                                    <input type="text" class="form-control inputsearch" name="search"
                                                        placeholder="buscar patrimônio" />
                                                </div>
                                                <button id="search-button" class="btn btn-primary">
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-md-2 mt-5 ml-auto ">
                                        <div class="d-flex pl-2">
                                            <button class="btn btn-link ml-4 pl-5" onclick="imprimir('table')">
                                                <i class="fa-solid fa-print"></i>
                                                Imprimir
                                            </button>
                                        </div>


                                    </div>



                                </div>

                            </div>


                            <table class="table table-striped" id="table">
                                <tr>
                                    <th>Equipamento</th>
                                    <th>Modelo</th>
                                    <th>Patrimônio</th>
                                    <th>Data da Entrega</th>
                                    <th>Remover</th>
                                </tr>

                                <?php if ($busca != []) { ?>
                                                                 
                                   
                                   <?php if ($busca != []) { ?>
                                    <tr>
                                        <td><?= $busca->equipamento?></td>
                                        <td class="modelo"><?= ucfirst($busca->modelo)?></td>
                                        <td class="patrimonio"><?= $busca->patrimonio?></td>
                                        <td><?= implode("/", array_reverse(explode("-", $busca->data_entrada)))?></td>
                                        <td onclick="alertConfirm(this)" class="trash">
                                            <i class="fa-solid fa-trash pl-4"></i>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php } ?>

                                                                          

                                <?php foreach ($listagem as $index => $item) { ?>

                                    <tr>
                                        <td><?= $item->equipamento ?></td>
                                        <td><?= ucfirst($item->modelo) ?></td>
                                        <td><?= $item->patrimonio ?></td>
                                        <td><?= implode("/", array_reverse(explode("-", $item->data_entrada))) ?></td>
                                        <td onclick="alertConfirm(this)" class="trash">
                                            <i class="fa-solid fa-trash pl-4"></i>
                                        </td>
                                    </tr>
                                <?php } ?>



                            </table>




                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <?php
    // Limpar os dados da sessão após a exibição da tabela
    unset($_SESSION['listagem']);
    unset($_SESSION['search']);
    ?>


</body>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

<script type="text/javascript" src="https://example.com/fontawesome/v6.6.0/js/conflict-detection.js"></script>

<script src="scripts/scripts.js"></script>

</html>