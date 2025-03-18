<?php 
    session_start();

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
        header('location: index.php?login=error2');
    }
    
    $search = isset($_SESSION['searchEntry']) ? $_SESSION['searchEntry'] : [];
    $saida = isset($_SESSION['searchExit']) ? $_SESSION['searchExit'] : [];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Estoque DTI - Busca de Patrimônio</title>
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
                    <button class="btn btn-outline-primary mb-5 d-md-none  ml-3" data-toggle="collapse"
                        data-target="#sidebarLinks" aria-expanded="false" aria-controls="sidebarLinks">
                        <span class="material-icons">
                            Expandir Menu
                        </span>
                    </button>
                    <div class="collapse d-md-block" id="sidebarLinks">
                        <ul class="list-group" id="list-links">
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
                </div>
                <!--Formulários -->
                <div class="col-md-9">
                    <div class="container pagina">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Entrada de Patrimônio
                                    <img src="img/entry.png" class="pb-2">
                                </h5>
                                <hr id="row-search">

                                <div class="row pt-5">
                                    <div class=" col-md-12 ">
                                        <form method="post" action="controller.php?action=readEntry">
                                            <div class="d-flex ">
                                                <div class="ml-auto">
                                                    <input type="text" name="search" class="form-control"
                                                        placeholder="buscar patrimônio" id="search" required />
                                                </div>
                                                <button id="search-button" class="btn btn-primary">
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">

                                            <table class="table table-striped small-table">
                                                <tr>
                                                    <th>Equipamento</th>
                                                    <th>Modelo</th>
                                                    <th>Patrimônio</th>
                                                    <th>Origem</th>
                                                    <th>Responsável</th>
                                                    <th>Entrada</th>
                                                    
                                                </tr>

                                                <?php foreach($search as $index => $item) { ?>
                                                <tr>
                                                    <td><?= $item->equipamento ?> </td>
                                                    <td><?= ucfirst($item->modelo) ?> </td>
                                                    <td><?= $item->patrimonio ?></td>
                                                    <td><?= ucfirst($item->origem) ?></td>
                                                    <td><?= ucfirst($item->responsavel) ?></td>
                                                    <td><?= implode("/", array_reverse(explode("-", $item->data_entrada))) ?></td>
                                                </tr>                                                                                  

                                                <?php } ?>
                                            </table>
                                        
                                            



                                    </div>


                                </div>



                            </div>


                        </div>
                        
                                                
                        <div class="row" id="search-exit">
                            <div class="col-md-12">
                                <h5>Saída de Patrimônio
                                <img src="img/exit.png" class="pb-2">
                                </h5>
                                <hr id="row-search">

                                <div class="row mt-5">
                                    <div class=" col-md-12 ">
                                        <form method="post" action="controller.php?action=readExit">
                                            <div class="d-flex ">
                                                <div class="ml-auto">
                                                    <input type="text" name="search" class="form-control"
                                                        placeholder="buscar patrimônio" id="search"  required/>
                                                </div>
                                                <button id="search-button" class="btn btn-primary">
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">


                                        
                                            <table class="table table-striped small-table">
                                                <tr>
                                                    <th>Equipamento</th>
                                                    <th>Modelo</th>
                                                    <th>Patrimônio</th>
                                                    <th>Destino</th>
                                                    <th>Responsável</th>
                                                    <th>Saida</th>
                                                    
                                                </tr>

                                            <?php foreach($saida as $index => $item) { ?>
                                                <tr>
                                                    <td><?= $item->equipamento ?> </td>
                                                    <td><?= ucfirst($item->modelo) ?> </td>
                                                    <td><?= $item->patrimonio ?></td>
                                                    <td><?= ucfirst($item->destino) ?></td>
                                                    <td><?= ucfirst($item->responsavel) ?></td>
                                                    <td><?= implode("/", array_reverse(explode("-", $item->data_saida))) ?></td>
                                                </tr>                                                                                  

                                                <?php } ?>
                                            </table> 
                                        
                                              

                                        

                                    </div>


                                </div>



                            </div>


                        </div>
                     

                    </div>
                </div>
            </div>

        </div>


        </div>


    </section>

    <?php
    // Limpar os dados da sessão após a exibição da tabela
    unset($_SESSION['searchEntry']);
    unset($_SESSION['searchExit']);
    ?>


</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Popper.js (obrigatório para dropdowns e tooltips) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>



</html>