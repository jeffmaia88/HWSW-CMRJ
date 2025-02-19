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
    $entradaService->insert();

    header('location: entrada.php?insert=1');



} else if ($action == 'readAll') {

    $listar = new Entrada();
    $connection = new Connection();

    $entradaService = new EntradaService($connection, $listar);
    $listagem = $entradaService->readAll();

} else if ($action == 'read') {

    $key = new Entrada();
    $connection = new connection();
    $key->__set('patrimonio', $_POST['search']);

    $entradaService = new EntradaService($connection, $key);
    $entradaService->read();

    $search = $entradaService->read();

    header('location: saida.php?read=1&id=' . $search->id . '&equip=' . $search->equipamento . '&patrim=' . $search->patrimonio . '&resp=' . $search->responsavel . '&   data=' . $search->data_entrada);

} else if ($action == 'remove') {

    $entrada = new Entrada();
    $connection = new Connection();

    $entrada->__set('id', $_GET['id']);

    print_r($entrada);

    $entradaService = new EntradaService($connection, $entrada);
    $entradaService->remove();




    header('location: saida.php?remove=1');


}


?>