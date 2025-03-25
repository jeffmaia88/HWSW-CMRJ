<?php 
    session_start();
//dados passados para superglobal para autenticação
    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
        header('location: index.php?login=error2');
    }
//dados passados para superglobal para armazenar nome do usuario e preencher input de responsavel.    
    $usuario = isset($_SESSION['name']) ? $_SESSION['name'] : [];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Estoque DTI - Saída de Patrimônio</title>
</head>

<body>

<!--Cabeçalho e Barra Superior-->
    <nav class="navbar navbar-expand-sm navbar-nav " id="upbar">
        <div class="container">
            <a href="entrada.php" class="link-cmrj ">
                <img src="img/logo.jpg">
                <h4 class="d-inline" id="logoname">Hardware - Sistema de Estoque CMRJ</h4>
            </a>

            <div class="d-sm-inline-block ml-auto ">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item ">
                        <a href="logoff.php" class="nav-link text-white">Sair</a>
                    </li>
            </div>
        </div>
        </div>
    </nav>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar-principal">
          <span class="navbar-toggler-icon"></span>
        </button>

<!--Corpo do Site -->
    <!-- Links Laterais -->
     
    <section id="home">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3">

                    <button class="btn btn-outline-primary mb-5 d-md-none  ml-3" data-toggle="collapse" 
                    data-target="#sidebarLinks" aria-expanded="false"  aria-controls="sidebarLinks"> <!-- botão para responsividade -->
                     <span class="material-icons">
                        Expandir Menu
                    </span>
                    </button>

                    <div class="collapse d-md-block" id="sidebarLinks"> <!-- Div afetada pelo botão em responsividade -->
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
         <!-- cabeçalho do formulario -->
                 <div class="col-md-9">
                    <div class="container pagina">
                        <div class="row">
                            <div class="col">
                                <h4>Saída de Patrimônio
                                    <img src="img/sub.png" class="pl-4 mb-2">
                                </h4>
                                <hr>
        <!-- início do Formulario em 2 colunas -->
                                <form method="post" action="controller.php?action=insertExit">
                                    <div class="row mb-3 d-flex tarefa">
            <!-- coluna da esquerda -->
                                        <div class="col-sm-6"> 
                                            <div class="form-group">
                                                <label for="equip"> Equipamento: </label>
                                               
                                                <input type="text" class="form-control" name="equipamento" id="equipamento" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="Respons" class="mr-4">Modelo: </label>
                                                <input type="text" name="modelo" class="form-control" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="Patrim" class="mr-3">Patrimônio: </label>
                                                <input type="number" class="form-control" name="patrimonio" readonly>
                                            </div>
                                            
                                            
            <!-- coluna da direita -->
                                        </div>
                                        <div class="col-sm-6"> 

                                            <div class="form-group">
                                                <label for="Respons" class="mr-3">Setor Destino:</label>
                                                <input type="text" name="destino" class="form-control"
                                                required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Respons" class="mr-4">Responsável:</label>
                                                <input type="text" name="responsavel" class="form-control" value="<?= $usuario ?>"
                                                readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="Respons">Data de Saída: </label>
                                                <input type="date" class="form-control" name="data_saida"
                                                required>
                                            </div>
                                            
                                        </div>
                                        <button class="btn btn-danger ml-auto mt-4">Realizar Saída</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php if (isset($_GET['insert']) && $_GET['insert'] == 1) { ?>
                            <div class="bg-danger pt-2 text-white d-flex justify-content-center mt-5">
                                <h5>Saída Realizada com Sucesso</h5>
                            </div>
                    <?php } ?>
                    </div>                    
                </div>             
            </div>
    </section>
</body>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Popper.js (obrigatório para dropdowns e tooltips) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


    <script src="scripts/scripts.js"></script>
    <script>
        window.onload = recuperarDados();
    </script>
    

</html>