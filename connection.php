<?php
//classe de conexão com o banco
class Connection
{

	private $host = '127.0.0.1:3312'; //endereço do banco de dados
	private $dbname = 'db_hardware'; //nome do bd
	private $user = 'administrador'; //usuario do bd
	private $pass = 'dezembro88'; // senha do bd

	//método de conexao
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