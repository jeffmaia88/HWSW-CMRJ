<?php

require "../../app_private/entrada.model.php";
require "../../app_private/entrada.service.php";
require "../../app_private/conection.php";

echo '<pre>';
print_r($_POST);
echo '</pre>';


$entrada = new Entrada();

$entrada->__set('entrada', $_POST['entrada']);

$connection = new Connection();

$entradaService = new EntradaService($connection, $entry);


echo '<pre>';
print_r($entradaService);
echo '</pre>';



?>