<?php

class Connection
{

    private $host = '127.0.0.1:3312';
    private $dbname = 'db_hardware';
    private $user = 'admin';
    private $password = 'dezembro88';



    public function conecting()
    {
        try {
            $conection = new PDO(

                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->password"

            );

            return $conection;
        } catch (PDOException $e) {
            echo '<p>' . $e->getMessage() . '<p>';
        }


    }
}


?>