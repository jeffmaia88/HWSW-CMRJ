<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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
                            <a href="#">Saída Patrimônio</a>
                        </li>
                        <li class=" list-group-item ">
                            <a href="#">Listar Estoque </a>
                        </li>

                    </ul>

                </div>
                                                    <!--Formulários -->
                                                    <div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Saída Patrimônio</h4>
								<hr />

								<div class="row mb-3 d-flex align-items-center tarefa">     <!-- linha -->
									<div class="col-sm-6"> <!-- coluna da esquerda -->
                                        <form>
                                            <div class="form-group">
                                                <label for="Equip"> Equipamento: </label>
                                                <select class="custom-select inputs" id="Equip">
                                                    <option selected>Equipamento</option>
                                                    <option value="1">Computador</option>
                                                    <option value="2">Monitor</option>
                                                    <option value="3">Impressora</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="Patrim">Patrimônio: </label>
                                                <input type="text" class="form-control inputs" id="Equip">
                                            </div>
                                        </form>                             
                                    </div>

                                    <div class="col-sm-6"> <!-- coluna da direita -->
                                        <form>                                            
                                            <div class="form-group">
                                                <label for="Respons">Responsável</label>
                                                <input type="text" class="form-control inputs" id="Respons">
                                            </div>
                                            <div class="form-group">
                                                <label for="Respons">Data: </label>
                                                <input type="date" class="form-control inputs" id="Respons">
                                            </div>
                                        </form>

                                        

                                    </div>
                                    <button type="button" class="btn btn-danger ml-auto mt-4">Remover</button>
                                </div>
                                


                                
									 

								
									
									
								
							</div>
						</div>
					</div>
				</div>

            </div>
        </div>


    </section>

   

    
</body>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>