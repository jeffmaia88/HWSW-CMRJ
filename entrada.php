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
                            <div class="col">
                                <h4>Entrada Patrimônio</h4>
                                <hr />

                                <form method="post" action="entrada_controller.php?action=insert">
                                    <div class="row mb-3 d-flex tarefa"> <!-- linha -->

                                        <div class="col-sm-6"> <!-- coluna da esquerda -->
                                            <div class="form-group">
                                                <label for="Equip"> Equipamento: </label>
                                                <select class="custom-select inputs" name="equipamento" id="Equip">
                                                    <option selected></option>
                                                    <option value="computador">Computador</option>
                                                    <option value="monitor">Monitor</option>
                                                    <option value="impressora">Impressora</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="Patrim">Patrimônio: </label>
                                                <input type="text" class="form-control inputs" name="patrimonio"
                                                    id="patrimonio">
                                            </div>

                                        </div>
                                        <div class="col-sm-6"> <!-- coluna da direita -->

                                            <div class="form-group">
                                                <label for="Respons">Responsável</label>
                                                <input type="text" name="responsavel" class="form-control inputs"
                                                    id="responsavel">
                                            </div>
                                            <div class="form-group">
                                                <label for="Respons">Data: </label>
                                                <input type="date" class="form-control inputs" name="data_entrada"
                                                    id="data_entrada">
                                            </div>
                                        </div>
                                        <button class="btn btn-success ml-auto mt-4">Cadastrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <?php if (isset($_GET['insert']) && $_GET['insert'] == 1) { ?>
                    <div class="bg-primary pt-2 text-white d-flex justify-content-center">
                        <h5>Equipamento Incluído com Sucesso</h5>
                    </div>
                <?php } ?>


            </div>


    </section>




</body>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
</body>

</html>