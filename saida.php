<?php
session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
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
                            <div class="col">
                                <h4>Saída de Patrimônio
                                    <img src="img/sub.png" class="pl-4 mb-2">
                                </h4>
                                <hr />

                                <form method="post" action="controller.php?action=insertExit">
                                    <div class="row mb-3 d-flex tarefa"> <!-- linha -->

                                        <div class="col-sm-6"> <!-- coluna da esquerda -->
                                            <div class="form-group">
                                                <label for="Equip"> Equipamento: </label>
                                                <select class="custom-select inputs" name="equipamento" id="Equip" required>
                                                    <option selected></option>
                                                    <option value="Computador">Computador</option>
                                                    <option value="Monitor">Monitor</option>
                                                    <option value="Notebook">Notebook</option>
                                                    <option value="Impressora">Impressora</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="Respons" class="mr-4">Modelo: </label>
                                                <input type="text" name="modelo" class="form-control inputs2"
                                                required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Patrim" class="mr-3">Patrimônio: </label>
                                                <input type="text" class="form-control inputs" name="patrimonio"
                                                required>
                                            </div>


                                        </div>
                                        <div class="col-sm-6"> <!-- coluna da direita -->

                                            <div class="form-group">
                                                <label for="Respons" class="mr-3">Setor Destino:</label>
                                                <input type="text" name="destino" class="form-control inputs"
                                                required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Respons" class="mr-4">Responsável:</label>
                                                <input type="text" name="responsavel" class="form-control inputs"
                                                required>
                                            </div>
                                            <div class="form-group">
                                                <label for="Respons">Data de Saida: </label>
                                                <input type="date" class="form-control inputs" name="data_saida" required>
                                            </div>

                                        </div>
                                        <button class="btn btn-danger ml-auto mt-4">Realizar Saída</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php if (isset($_GET['insert']) && $_GET['insert'] == 1) { ?>
                            <div class="bg-danger pt-2 text-white d-flex justify-content-center mt-5">
                                <h5>Saída realizada com sucesso</h5>
                            </div>
                            <div class="bg-primary pt-2 text-white d-flex justify-content-center mt-5">
                                <h5>Estoque atualizado com sucesso</h5>
                            </div>
                        <?php } ?>
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

</html>