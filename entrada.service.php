<?php

class EntradaService
{

	private $conexao;
	private $entrada;

	public function __construct(Connection $conexao, Entrada $entrada)
	{
		$this->conexao = $conexao->conecting();
		$this->entrada = $entrada;
	}

	public function insert()
	{ //create
		$query = 'insert into tb_entrada(equipamento,patrimonio,responsavel,data_entrada)values(:equipamento, :patrimonio, :responsavel, :data_entrada)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':equipamento', $this->entrada->__get('equipamento'));
		$stmt->bindValue(':patrimonio', $this->entrada->__get('patrimonio'));
		$stmt->bindValue(':responsavel', $this->entrada->__get('responsavel'));
		$stmt->bindValue(':data_entrada', $this->entrada->__get('data_entrada'));
		$stmt->execute();
	}

	public function readAll()
	{
		$query = 'select id,equipamento,patrimonio,responsavel,data_entrada from tb_entrada';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	/*public function read()
				   {

					   $retorno = $this->entrada->__get('patrimonio');
					   $query = 'select equipamento, patrimonio, data_entrada from tb_entrada where patrimonio = :busca';
					   $stmt = $this->conexao->prepare($query);
					   $stmt->bindValue(':busca', $retorno);
					   $stmt->execute();
					   return $stmt->fetch(PDO::FETCH_OBJ);
				   }*/

	public function remove()
	{
		$query = 'delete from tb_entrada where id = :id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->entrada->__get('id'));
		$stmt->execute();

	}


}


?>