<?php

require "../../HWSW-CMRJ-private/entrada.model.php";
require "../../HWSW-CMRJ-private/entrada.service.php";
require "../../HWSW-CMRJ-private/conection.php";

echo '<pre>';
print_r($_POST);
echo '</pre>';


$entrada = new Entrada();

$entrada->__set('patrimonio', $_POST['patrimonio']);

$connection = new Connection();

$entradaService = new EntradaService($connection, $entrada);

echo '<pre>';
print_r($entradaService);
echo '<pre>';



?>