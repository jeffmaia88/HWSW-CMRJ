<?php

require "../../HWSW-CMRJ-private/entrada.model.php";
require "../../HWSW-CMRJ-private/saida.model.php";
require "../../HWSW-CMRJ-private/saida.service.php";
require "../../HWSW-CMRJ-private/entrada.service.php";
require "../../HWSW-CMRJ-private/connection.php";



$action = isset($_GET['action']) ? $_GET['action'] : $action;



if ($action == 'insertEntry') {


    $entrada = new Entrada();

    $entrada->__set('equipamento', $_POST['equipamento']);
    $entrada->__set('modelo', $_POST['modelo']);
    $entrada->__set('patrimonio', $_POST['patrimonio']);
    $entrada->__set('origem', $_POST['origem']);
    $entrada->__set('responsavel', $_POST['responsavel']);
    $entrada->__set('data_entrada', $_POST['data_entrada']);


    $connection = new Connection();

    $entradaService = new EntradaService($connection, $entrada);
    $entradaService->insert();

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

    header('location: saida.php?insert=1');



} else if ($action == 'readAll') {

    $listar = new Entrada();
    $connection = new Connection();

    $entradaService = new EntradaService($connection, $listar);
    $listagem = $entradaService->readAll();

} else if ($action == 'readEntry') {

    $key = new Entrada();
    $connection = new connection();
    $key->__set('patrimonio', $_POST['search']);

    $entradaService = new EntradaService($connection, $key);
    $entradaService->read();

    $search = $entradaService->read();

    header('location: busca.php?read=1&id=' . $search->id . '&equip=' . $search->equipamento . '&patrim=' . $search->patrimonio . '&resp=' . $search->responsavel . '&   data=' . $search->data_entrada);

}  else if ($action == 'readExit') {

    $key = new Saida();
    $connection = new connection();
    $key->__set('patrimonio', $_POST['search']);

    $saidaService = new SaidaService($connection, $key);
    $saidaService->read();

    $search = $saidaService->read();

    header('location: busca.php?read=2&id=' . $search->id . '&equip=' . $search->equipamento . '&model=' . $search->modelo .'&patrim=' . $search->patrimonio . 
    '&dest=' . $search->destino .'&resp=' . $search->responsavel . '&data=' . $search->data_saida);

} else if ($action == 'remove') {

    $entrada = new Entrada();
    $connection = new Connection();

    $entrada->__set('id', $_GET['id']);

    print_r($entrada);

    $entradaService = new EntradaService($connection, $entrada);
    $entradaService->remove();




    header('location: busca.php?remove=1');


}


?>