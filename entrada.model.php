<?php 
// model da Classe Entrada
class Entrada {

private $id;
private $equipamento;
private $modelo;
private $responsavel;
private $patrimonio;
private $origem;
private $data_entrada;
private $baixado;


public function __get($atribute) {
    return $this->$atribute;
}

public function __set($atribute, $value) {
    $this->$atribute = $value;
}


}



?>