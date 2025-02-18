<?php

require "../../HWSW-CMRJ-private/entrada.model.php";
require "../../HWSW-CMRJ-private/entrada.service.php";
require "../../HWSW-CMRJ-private/connection.php";



$action = isset($_GET['action']) ? $_GET['action'] : $action;

$search = new Entrada();




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
    $connection = new connection();
    $key = new Entrada();

    $key->__set('patrimonio', $_POST['search']);

    $entradaService = new EntradaService($connection, $search);

    $AllResult = $entradaService->readAll();

    foreach ($AllResult as $index => $item) {
        if ($item->patrimonio == $key->patrimonio) {

            $search->id = $item->id;
            $search->equipamento = $item->equipamento;
            $search->patrimonio = $item->patrimonio;
            $search->responsavel = $item->responsavel;
            $search->data_entrada = $item->data_entrada;
            break;
        }
    }

    header('location: saida.php?recover=1&id=' . $search->id . '&equip=' . $search->equipamento . '&patrim=' . $search->patrimonio . '&resp=' . $search->responsavel . '&data=' . $search->data_entrada);

}


?>