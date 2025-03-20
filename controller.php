<?php
//endereços dos documentos utilizados
require "../../private/entrada.model.php";
require "../../private/saida.model.php";
require "../../private/saida.service.php";
require "../../private/service.php";
require "../../private/connection.php";


//
$action = isset($_GET['action']) ? $_GET['action'] : $action;


//parametro action vindo do Form da pagina entrada.php via POST com os dados do equipamento
if ($action == 'insertEntry') {

    
    $entrada = new Entrada(); //criação de objeto
    
    $entrada->__set('equipamento', $_POST['equipamento']);
    $entrada->__set('modelo', $_POST['modelo']);
    $entrada->__set('patrimonio', strval($_POST['patrimonio']));
    $entrada->__set('origem', $_POST['origem']);
    $entrada->__set('responsavel', $_POST['responsavel']);
    $entrada->__set('data_entrada', $_POST['data_entrada']);
    $entrada->__set('baixado', isset($_POST['baixado'])? 1 :0);

    //criação do objeto a partir da classe conexao
    $connection = new Connection();

    //criação do objeto a partir da classe Entradaservice, que envia a conexao e os dados a serem persistidos no banco
    $entradaService = new EntradaService($connection, $entrada);
    $entradaService->insert(); // insere na tabela tb_entrada
    $entradaService->insertEstoque(); //insere na tabela tb_estoque

    header('location: entrada.php?insert=1'); // redireciona para entrada.php com parametro  insert=1 com finalidade de exibição de mensagem de sucesso


//parametro action vindo do Form da pagina saida.php via POST com os dados do equipamento, finalidade de inserção no banco tb_saida e remoção do tb_estoque
} else if ($action == 'insertExit') {

    
    $saida = new Saida(); //criação de objeto a partir da classe Saida

    $saida->__set('equipamento', $_POST['equipamento']);
    $saida->__set('modelo', $_POST['modelo']);
    $saida->__set('patrimonio', $_POST['patrimonio']);
    $saida->__set('destino', $_POST['destino']);
    $saida->__set('responsavel', $_POST['responsavel']);
    $saida->__set('data_saida', $_POST['data_saida']);

    $connection = new Connection(); //criação do objeto a partir da classe conexao

    //criação do objeto a partir da classe Saidaservice, que envia a conexao e os dados a serem persistidos e removidos no banco
    $saidaService = new SaidaService($connection, $saida);
    $saidaService->insert(); // insere na tabela tb_saida
    $saidaService->removeEstoque(); //remove da tabela tb_estoque


    header('location: saida.php?insert=1'); // redireciona para saida.php com parametro  insert=1 com finalidade de exibição de mensagem de sucesso


// parametro action vindo do FORM para leitura de 1 patrimonio na pagina listar.php, e enviado atraves de metodo post no input  
} else if ($action == 'read') {

    
    $key = new Entrada(); //criação de objeto  a partir da Classe Entrada
    $connection = new connection();//criação de objeto de conexao
    $key->__set('patrimonio', trim($_POST['search'])); // insere o atributo patrimonio obtido por form para busca

    $entradaService = new EntradaService($connection, $key); // criação de objeto entradaservice
    $entradaService->read();

    $search = $entradaService->read();

    // controle de decisão para o campo BAIXA na <table> de equipamentos em listar.php
    if($search->baixado == 0) {
            $search->baixado = 'NÃO';
        }else {
            $search->baixado = "SIM";
        } 
    

    // armazenamento na superglobal Session do objeto obtido vindo de tb_estoque
    session_start();
    $_SESSION['search'] = $search;

    header("Location: listar.php");



// parametro action vindo do FORM para leitura de 1 patrimonio na pagina busca.php, e enviado atraves de metodo post no input  na area de Entrada
} else if ($action == 'readEntry') {

    $key = new Entrada(); //criação de objeto  a partir da Classe Entrada
    $connection = new connection(); //criação de objeto de conexao
    $key->__set('patrimonio', trim($_POST['search'])); // insere o atributo patrimonio obtido por form para busca

    //criação do objeto a partir da classe Entradaservice, que envia a conexao e os dados a serem buscados no banco
    $entradaService = new EntradaService($connection, $key);
    $entradaService->readEntry();

    $search = $entradaService->readEntry();

    // armazenamento na superglobal Session do objeto obtido na tb_entrada
    session_start();
    $_SESSION['searchEntry'] = $search;

    header("Location: busca.php");

  
// parametro action vindo do FORM para leitura de 1 patrimonio na pagina busca.php, e enviado atraves de metodo post no input na area de Saida
} else if ($action == 'readExit') {

    $key = new Saida(); //criação de objeto  a partir da Classe Saida
    $connection = new connection(); //criação de objeto de conexao
    $key->__set('patrimonio', trim($_POST['search'])); // insere o atributo patrimonio obtido por form para busca

     //criação do objeto a partir da classe Entradaservice, que envia a conexao e os dados a serem persistidos no banco
    $saidaService = new SaidaService($connection, $key);
    $saidaService->readExit();

    $search = $saidaService->readExit();

    // armazenamento na superglobal Session do objeto obtido na tb_saida
    session_start();
    $_SESSION['searchExit'] = $search;


    header("Location: busca.php");

// parametro action vindo do evento OnChange do select e redirecionado via JS. lógica de listagem dinâmica de acordo com o value fornecido
} else if ($action == 'filter') {

    $listar = new Entrada(); //criação de objeto  a partir da Classe Entrada
    $listar->__set('equipamento', $_GET['value']);
    
    $connection = new Connection(); //criação do objeto a apartir da classe de Conexao

    //criação do objeto a partir da classe Entradaservice, que envia a conexao e os dados a serem buscados no banco
    $entradaService = new EntradaService($connection, $listar); 
    $listagem = $entradaService->filter();

    // controle de decisão para o campo BAIXA na <table> de equipamentos em listar.php
    foreach($listagem as $index => $item) {
        if($item->baixado == 0) {
            $item->baixado = 'NÃO';
        }else {
            $item->baixado = "SIM";
        } 
    }

    // armazenamento na superglobal Session do objeto obtido na tb_estoque
    session_start();
    $_SESSION['listagem'] = $listagem;  

    header("Location: listar.php");
        
}




?>