<?php

class SaidaService
{

	private $conexao;
	private $saida;

	public function __construct(Connection $conexao, Saida $saida)
	{
		$this->conexao = $conexao->conecting();
		$this->saida = $saida;
	}

	public function insert()
	{ //create
		$query = 'insert into tb_saida(equipamento,modelo,patrimonio,destino,responsavel,data_saida)values(:equipamento,:modelo, :patrimonio,:destino, :responsavel, :data_saida)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':equipamento', $this->saida->__get('equipamento'));
		$stmt->bindValue(':modelo', $this->saida->__get('modelo'));
		$stmt->bindValue(':patrimonio', $this->saida->__get('patrimonio'));
		$stmt->bindValue(':destino', $this->saida->__get('destino'));
		$stmt->bindValue(':responsavel', $this->saida->__get('responsavel'));
		$stmt->bindValue(':data_saida', $this->saida->__get('data_saida'));
		$stmt->execute();
	}

	public function readExit()
	{

		$query = 'select id,equipamento,modelo,patrimonio,destino,responsavel,data_saida from tb_saida where patrimonio = :search';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':search', $this->saida->__get('patrimonio'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function remove()
	{
		$query = 'delete from tb_saida where id = :id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->saida->__get('id'));
		$stmt->execute();

	}

	public function removeEstoque()
	{
		$query = 'delete from tb_estoque where patrimonio = :patrimonio';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':patrimonio', $this->saida->__get('patrimonio'));
		$stmt->execute();


	}


}


?>