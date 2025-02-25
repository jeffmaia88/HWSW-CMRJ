<?php 
    session_start();

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
        header('location: index.php?login=error2');
    }
    

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
                        <li class="list-group-item ">
                            <a href="saida.php">Saída de Patrimônio</a>
                        </li>
                        <li class="list-group-item ">
                            <a href="busca.php">Busca de Patrimônio</a>
                        </li>
                        <li class=" list-group-item ">
                            <a href="listar.php">Listagem de Estoque </a>
                        </li>
                        


                    </ul>

                </div>
                <!--Formulários -->
                <div class="col-md-9">
                    <div class="container pagina">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Busca de Entrada de Patrimônio
                                    <img src="img/entry.png" class="pb-2">
                                </h4>
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


                                        <?php if (isset($_GET['read']) && $_GET['read'] == 1 && $_GET['id'] != null) { ?>



                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Equipamento</th>
                                                    <th>Modelo</th>
                                                    <th>Patrimônio</th>
                                                    <th>Setor de Origem</th>
                                                    <th>Responsável</th>
                                                    <th>Data de entrada</th>
                                                    <th>Remover</th>
                                                </tr>
                                                <td> <?= $_GET['equip'] ?> </td>
                                                <td> <?= ucfirst($_GET['model']) ?> </td>
                                                <td><?= $_GET['patrim'] ?></td>
                                                <td><?= ucfirst($_GET['origem']) ?></td>
                                                <td><?= ucfirst($_GET['resp']) ?></td>
                                                <td><?= implode("/", array_reverse(explode("-", $_GET['data']))) ?></td>
                                                <td onclick="alertConfirm()" class="trash">
                                                    <i class="fa-solid fa-trash pl-4"></i>
                                                </td>

                                            </table>

                                        <?php } ?>



                                    </div>


                                </div>



                            </div>


                        </div>
                        <?php if (isset($_GET['remove']) && $_GET['remove'] == 1) { ?>
                            <div class="bg-danger pt-2 text-white d-flex justify-content-center mt-5 ">
                                <h5>Equipamento Excluído com Sucesso</h5>
                            </div>
                        <?php } ?>

                                                
                        <div class="row" id="search-exit">
                            <div class="col-md-12">
                                <h4>Busca de Saída de Patrimônio
                                <img src="img/exit.png" class="pb-2">
                                </h4>
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


                                        <?php if (isset($_GET['read']) && $_GET['read'] == 2 && $_GET['id'] != null) { ?>



                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Equipamento</th>
                                                    <th>Modelo</th>
                                                    <th>Patrimônio</th>
                                                    <th>Setor Destino</th>
                                                    <th>Responsável</th>
                                                    <th>Data de Saida</th>
                                                    <th>Remover</th>
                                                </tr>
                                                <td> <?= $_GET['equip'] ?> </td>
                                                <td> <?= ucfirst($_GET['model']) ?> </td>
                                                <td><?= $_GET['patrim'] ?></td>
                                                <td><?= ucfirst($_GET['dest']) ?></td>
                                                <td><?= ucfirst($_GET['resp']) ?></td>
                                                <td><?= implode("/", array_reverse(explode("-", $_GET['data']))) ?></td>
                                                <td onclick="alertConfirm()" class="trash">
                                                    <i class="fa-solid fa-trash pl-4"></i>
                                                </td>

                                            </table>

                                        <?php } ?>



                                    </div>


                                </div>



                            </div>


                        </div>
                        <?php if (isset($_GET['remove']) && $_GET['remove'] == 2) { ?>
                            <div class="bg-danger pt-2 text-white d-flex justify-content-center mt-5 ">
                                <h5>Equipamento Excluído com Sucesso</h5>
                            </div>
                        <?php } ?>


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

<script>

    
    function remove(id) {
        location.href = 'controller.php?action=remove&id=' + id;
    }


    function alertConfirm() {
            if (confirm("Deseja Realmente excluir o Equipamento do Registro de Entradas?")) {
                    remove(parseInt(<?= $_GET['id'] ?>));
  } 
    
}

</script>


</html>