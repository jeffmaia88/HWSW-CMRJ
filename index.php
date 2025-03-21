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

    

    <title>Estoque DTI - Login</title>
</head>

<body>

<!--Cabeçalho e Barra Superior-->
    <nav class="navbar navbar-expand-sm navbar-nav" id="upbar">
        <div class="container">
            <a href="#" id="link-cmrj">
                <img src="img/logo.jpg">
                <h4 class="d-inline" id="logoname">Hardware - Sistema de Estoque CMRJ</h4>
            </a>
            
        </div>       
    </nav>

<!-- Card de Login e Senha -->
    <div class="container">
        <div class="row">
            <div class="card-login" id="card-login">
                <div class="card teste">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form method="post" action="authenticate_controller.php">
                        <div class="form-group">
                                <input type="text" class="form-control" placeholder="Login" name="login">
                        </div>
                        <div class="form-group">
                                <input type="password" class="form-control" placeholder="Senha" name="password">
                        </div>

<!-- Msgns de Erros de Autenticação, Dados Inválidos -->
                        <?php if(isset($_GET['login']) && $_GET['login'] == 'error') { ?>
                            <div class="text-danger">
                                Usuário ou senha inválidos
                            </div>

                        <?php } ?>
<!-- Msgns de Erros de Autenticação, Tentativa de login sem preenchimento de Login e Senha -->
                        <?php if(isset($_GET['login']) && $_GET['login'] == 'error2') { ?>
                            <div class="text-danger">
                                Faça Login antes de acessar o Sistema de Controle de Patrimônio
                            </div>

                        <?php } ?>


                            <button class="btn btn-lg btn-primary btn-block teste" type="submit">Entrar</button>                            
                        </form>
                    </div>
                </div>

            </div>

        </div>


    </div>

</body>

</html>