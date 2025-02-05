<?php

require "../../HWSW-CMRJ-private/entrada.model.php";
require "../../HWSW-CMRJ-private/entrada.service.php";
require "../../HWSW-CMRJ-private/connection.php";

echo '<pre>';
print_r($_POST);
echo '</pre>';


$entrada = new Entrada();

$entrada->__set('equipamento', $_POST['equipamento']);
$entrada->__set('patrimonio', $_POST['patrimonio']);
$entrada->__set('responsavel', $_POST['responsavel']);
$entrada->__set('data_entrada', $_POST['data_entrada']);

echo '<pre>';
print_r($entrada);
echo '<pre>';

$connection = new Connection();

$entradaService = new EntradaService($connection, $entrada);
$entradaService->inserir();

echo '<pre>';
print_r($entradaService);
echo '<pre>';



?>