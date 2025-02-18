<script>


    function remove(id) {
        location.href = 'entrada_controller.php?action=remove&id=' + id;
    }


</script>


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
                                <h4>Saída Patrimônio</h4>
                                <hr />

                                <div class="row pt-5">
                                    <div class=" col-md-12 ">
                                        <form method="post" action="entrada_controller.php?action=recover">
                                            <div class="d-flex ">
                                                <div class="ml-auto">
                                                    <input type="text" name="search" class="form-control"
                                                        placeholder="buscar patrimônio" id="search" />
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


                                        <?php if (isset($_GET['recover']) && $_GET['recover'] == 1 && $_GET['id'] != null) { ?>


                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Equipamento</th>
                                                    <th>Patrimônio</th>
                                                    <th>Responsável</th>
                                                    <th>Data de entrada</th>
                                                    <th>Remover</th>
                                                </tr>
                                                <td><?= $_GET['equip'] ?> </td>
                                                <td><?= $_GET['patrim'] ?></td>
                                                <td><?= $_GET['resp'] ?></td>
                                                <td><?= $_GET['data'] ?></td>
                                                <td><i class="fa-solid fa-trash pl-4"
                                                        onclick="remove(parseInt(<?= $_GET['id'] ?>))" ?></i> </td>







                                            </table>

                                        <?php } ?>

                                    </div>


                                </div>



                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php if (isset($_GET['remove']) && $_GET['remove'] == 1) { ?>
            <div class="bg-danger pt-2 text-white d-flex justify-content-center">
                <h5>Equipamento Excluído com Sucesso</h5>
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




</html>