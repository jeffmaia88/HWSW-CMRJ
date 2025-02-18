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



} else if ($action == 'recoverAll') {

    $listar = new Entrada();
    $connection = new Connection();

    $entradaService = new EntradaService($connection, $listar);
    $listagem = $entradaService->readAll();

} else if ($action == 'recover') {

    $search = new Entrada();
    $connection = new connection();
    $key = new Entrada();

    $key->__set('patrimonio', $_POST['search']);

    $entradaService = new EntradaService($connection, $search);

    $AllResult = $entradaService->readAll();

    foreach ($AllResult as $index => $item) {
        if ($item->patrimonio == $key->patrimonio) {

            $search->id = $item->id;
            $search->equipamento = ucfirst($item->equipamento);
            $search->patrimonio = $item->patrimonio;
            $search->responsavel = ucfirst($item->responsavel);
            $search->data_entrada = implode("/", array_reverse(explode("-", $item->data_entrada)));


            break;
        }
    }

    header('location: saida.php?recover=1&id=' . $search->id . '&equip=' . $search->equipamento . '&patrim=' . $search->patrimonio . '&resp=' . $search->responsavel . '&data=' . $search->data_entrada);

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