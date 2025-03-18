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
		$query = 'insert into tb_entrada(equipamento,modelo,patrimonio,origem,responsavel,data_entrada,baixado)values(:equipamento,:modelo, :patrimonio,:origem, :responsavel, :data_entrada, :baixado)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':equipamento', $this->entrada->__get('equipamento'));
		$stmt->bindValue(':modelo', $this->entrada->__get('modelo'));
		$stmt->bindValue(':patrimonio', $this->entrada->__get('patrimonio'));
		$stmt->bindValue(':origem', $this->entrada->__get('origem'));
		$stmt->bindValue(':responsavel', $this->entrada->__get('responsavel'));
		$stmt->bindValue(':data_entrada', $this->entrada->__get('data_entrada'));
		$stmt->bindValue(':baixado', $this->entrada->__get('baixado'));
		$stmt->execute();



	}

	public function insertEstoque()
	{

		$query2 = 'insert into tb_estoque(equipamento,modelo,patrimonio,data_entrada,baixado) values(:equipamento,:modelo, :patrimonio,:data_entrada,:baixado)';
		$stmt = $this->conexao->prepare($query2);
		$stmt->bindValue(':equipamento', $this->entrada->__get('equipamento'));
		$stmt->bindValue(':modelo', $this->entrada->__get('modelo'));
		$stmt->bindValue(':patrimonio', $this->entrada->__get('patrimonio'));
		$stmt->bindValue(':data_entrada', $this->entrada->__get('data_entrada'));
		$stmt->bindValue(':baixado', $this->entrada->__get('baixado'));
		$stmt->execute();

	}

	public function read()
	{
		$query = 'select equipamento, modelo, patrimonio, data_entrada,baixado from tb_estoque where patrimonio = :search';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':search', $this->entrada->__get('patrimonio'));
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function readEntry()
	{

		$query = 'select id,equipamento, modelo, patrimonio,origem,responsavel,data_entrada from tb_entrada where patrimonio = :search order by data_entrada DESC';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':search', $this->entrada->__get('patrimonio'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function remove()
	{
		$query = 'delete from tb_entrada where id = :id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->entrada->__get('id'));
		$stmt->execute();

	}

	public function filter()
	{
		$valor = $this->entrada->__get('equipamento');

		if ($valor == 'Todos') {
			$query = 'select equipamento,modelo,patrimonio,data_entrada,baixado from tb_estoque order by equipamento ASC, patrimonio ASC ';
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		} else if ($valor == 'Baixado') {
			$query = 'select equipamento,modelo,patrimonio,data_entrada,baixado from tb_estoque where baixado = 1 order by equipamento ASC, patrimonio ASC ';
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		} else {
			$query = 'select equipamento,modelo,patrimonio,data_entrada,baixado from tb_estoque where equipamento = :equipamento and baixado = 0 order by patrimonio ASC ';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':equipamento', $this->entrada->__get('equipamento'));
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}


	}



}


?>