<?php

require "../../private/entrada.model.php";
require "../../private/saida.model.php";
require "../../private/saida.service.php";
require "../../private/service.php";
require "../../private/connection.php";



$action = isset($_GET['action']) ? $_GET['action'] : $action;



if ($action == 'insertEntry') {


    $entrada = new Entrada();
    $entrada->__set('equipamento', $_POST['equipamento']);
    $entrada->__set('modelo', $_POST['modelo']);
    $entrada->__set('patrimonio', strval($_POST['patrimonio']));
    $entrada->__set('origem', $_POST['origem']);
    $entrada->__set('responsavel', $_POST['responsavel']);
    $entrada->__set('data_entrada', $_POST['data_entrada']);


    $connection = new Connection();

    $entradaService = new EntradaService($connection, $entrada);
    $entradaService->insert();
    $entradaService->insertEstoque();

    header('location: entrada.php?insert=1');



} else if ($action == 'insertExit') {


    $saida = new Saida();

    $saida->__set('equipamento', $_POST['equipamento']);
    $saida->__set('modelo', $_POST['modelo']);
    $saida->__set('patrimonio', $_POST['patrimonio']);
    $saida->__set('destino', $_POST['destino']);
    $saida->__set('responsavel', $_POST['responsavel']);
    $saida->__set('data_saida', $_POST['data_saida']);

    $connection = new Connection();

    $saidaService = new SaidaService($connection, $saida);
    $saidaService->insert();
    $saidaService->removeEstoque();


    header('location: saida.php?insert=1');


} else if ($action == 'read') {

    $key = new Entrada();
    $connection = new connection();
    $key->__set('patrimonio', trim($_POST['search']));

    $entradaService = new EntradaService($connection, $key);
    $entradaService->read();

    $search = $entradaService->read();

    session_start();
    $_SESSION['search'] = $search;

    header("Location: listar.php");




} else if ($action == 'readEntry') {

    $key = new Entrada();
    $connection = new connection();
    $key->__set('patrimonio', $_POST['search']);

    $entradaService = new EntradaService($connection, $key);
    $entradaService->readEntry();

    $search = $entradaService->readEntry();

    session_start();
    $_SESSION['searchEntry'] = $search;

    header("Location: busca.php");

  

} else if ($action == 'readExit') {

    $key = new Saida();
    $connection = new connection();
    $key->__set('patrimonio', $_POST['search']);

    $saidaService = new SaidaService($connection, $key);
    $saidaService->readExit();

    $search = $saidaService->readExit();


    session_start();
    $_SESSION['searchExit'] = $search;


    header("Location: busca.php");


} else if ($action == 'filter') {

    $listar = new Entrada();
    $listar->__set('equipamento', $_GET['value']);
    
    $connection = new Connection();

    $entradaService = new EntradaService($connection, $listar);
    $listagem = $entradaService->filter();

    session_start();
    $_SESSION['listagem'] = $listagem;

    header("Location: listar.php");
        
}




?>