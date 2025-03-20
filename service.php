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

	//método de inserção na tb_entrada
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

	//método de inserção na tb_estoque
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

	
	//método de busca na tb_estoque e retorno de 1 resultado para o <table> em listar.php
	public function read()
	{
		$query = 'select equipamento, modelo, patrimonio, data_entrada,baixado from tb_estoque where patrimonio = :search';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':search', $this->entrada->__get('patrimonio'));
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	
	//método de busca na tb_entrada e retorno para o <table> na area entrada em busca.php
	public function readEntry()
	{

		$query = 'select id,equipamento, modelo, patrimonio,origem,responsavel,data_entrada from tb_entrada where patrimonio = :search order by data_entrada DESC';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':search', $this->entrada->__get('patrimonio'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	//método de busca na tb_estoque com base no value do option do select em listar.php
	public function filter()
	{
		$valor = $this->entrada->__get('equipamento');

		//retorna todos os valores
		if ($valor == 'Todos') {
			$query = 'select equipamento,modelo,patrimonio,data_entrada,baixado from tb_estoque order by equipamento ASC, patrimonio ASC ';
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		//retorna somente os equipmamentos que contenham a chave Baixado em 1 no tb_estoque	
		} else if ($valor == 'Baixado') {
			$query = 'select equipamento,modelo,patrimonio,data_entrada,baixado from tb_estoque where baixado = 1 order by equipamento ASC, patrimonio ASC ';
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
			
		//retorna os equipamento de acordo com o value selecionado e que contenham a chave Baixado em 0 no tb_estoque	
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