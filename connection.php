<?php

class Connection
{

	private $host = '127.0.0.1:3312';
	private $dbname = 'db_hardware';
	private $user = 'administrador';
	private $pass = 'dezembro88';

	public function conecting()
	{
		try {

			$conexao = new PDO(
				"mysql:host=$this->host;dbname=$this->dbname",
				"$this->user",
				"$this->pass"
			);

			return $conexao;


		} catch (PDOException $e) {
			echo '<p>' . $e->getMessage() . '</p>';
		}
	}
}


?>