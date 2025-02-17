<?php

require "../../HWSW-CMRJ-private/entrada.model.php";
require "../../HWSW-CMRJ-private/entrada.service.php";
require "../../HWSW-CMRJ-private/connection.php";



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

}

?>