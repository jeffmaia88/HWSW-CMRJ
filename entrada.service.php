<?php

class EntradaService
{


    private $connection;
    private $entry;

    public function __construct($connection, $entry)
    {
        $this->connection = $connection->conecting();
        $this->$entry = $entry;
    }

    public function insert()
    {

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