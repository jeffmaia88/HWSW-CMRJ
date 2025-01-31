<?php

use Dba\Connection;

class EntradaService
{


    private $conexao;
    private $entrada;

    public function __construct($conexao,$entrada)
    {
        $this->conexao = $conexao->conecting();
        $this->entrada = $entrada;
    }

    public function insert()
    {
        $query = 'insert into tb_entrada(entrada)values(:patrimonio)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':patrimonio', $this->patrimonio->__get('patrimonio'));
        $stmt->execute();

    }

    public function read()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}


?>