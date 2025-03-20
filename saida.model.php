<?php
// model da Classe Saida
class Saida
{

    private $equipamento;
    private $modelo;
    private $patrimonio;
    private $destino;
    private $responsavel;

    private $data_saida;


    public function __get($atribute)
    {
        return $this->$atribute;
    }

    public function __set($atribute, $value)
    {
        $this->$atribute = $value;
    }

}





?>