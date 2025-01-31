<?php 

class Entrada {

private $id;
private $equipamento;
private $patrimonio;
private $responsavel;
private $data_entrada;

public function __get($atribute) {
    return $this->$atribute;
}

public function __set($atribute, $value) {
    $this->$atribute = $value;
}


}



?>