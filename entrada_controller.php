<?php

require "../../HWSW-CMRJ/entrada.model.php";
require "../../HWSW-CMRJ/entrada.service.php";
require "../../HWSW-CMRJ/connection.php";



$action = isset($_GET['action']) ? $_GET['action'] : $action;



if ($action == 'insert') {


    $entrada = new Entrada();

    $entrada->__set('equipamento', $_POST['equipamento']);
    $entrada->__set('patrimonio', $_POST['patrimonio']);
    $entrada->__set('responsavel', $_POST['responsavel']);
    $entrada->__set('data_entrada', $_POST['data_entrada']);


    $connection = new Connection();

    $entradaService = new EntradaService($connection, $entrada);
    $entradaService->inserir();

    header('location: entrada.php?insert=1');



} else if ($action == 'recoverAll') {

    $listar = new Entrada();
    $connection = new Connection();

    $entradaService = new EntradaService($connection, $listar);
    $listagem = $entradaService->readAll();

} else if ($action == 'recover') {



    $listar = new Entrada();
    $connection = new connection();

    $listar->__set('patrimonio', $_POST['busca']);

    echo '<pre>';
    print_r($_POST['busca']);
    echo '<pre>';

    $entradaService = new EntradaService($connection, $listar);

    $listagem = $entradaService->read();
    header('location: saida.php?recover=1');


    echo '<pre>';
    print_r($listagem);
    echo '<pre>';


}




?>