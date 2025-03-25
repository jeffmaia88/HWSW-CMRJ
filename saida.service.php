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

	//método de inserção na tb_saida
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

	//método de busca na tb_saida e retorno para o <table> na area saida em busca.php
	public function readExit()

	{
		// Primeiro tenta buscar com o valor tratado (prefixo 88)
		$query = 'SELECT id, equipamento, modelo, patrimonio, destino, responsavel, data_saida
				  FROM tb_saida
				  WHERE patrimonio LIKE :search 
				  ORDER BY data_saida DESC';
	
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':search', '%' . $this->saida->__get('patrimonio') . '%');
		$stmt->execute();
	
		$result = $stmt->fetchAll(PDO::FETCH_OBJ);
	
		// Se não encontrar, tenta buscar sem o prefixo 88
		if (!$result) {
			$query = 'SELECT id, equipamento, modelo, patrimonio, destino, responsavel, data_saida
					  FROM tb_saida
					  WHERE patrimonio LIKE :search 
					  ORDER BY data_saida DESC';
	
			$stmt = $this->conexao->prepare($query);
	
			// Remove o prefixo "88" (se tiver) e tenta novamente
			$valorSemPrefixo = preg_replace('/^88/', '', $this->saida->__get('patrimonio'));
			$stmt->bindValue(':search', '%' . $valorSemPrefixo . '%');
			$stmt->execute();
	
			$result = $stmt->fetchAll(PDO::FETCH_OBJ);
		}
	
		return $result;
	}

	//método de remoção da tb_estoque
	public function removeEstoque()
	{//remove
		$query = 'delete from tb_estoque where patrimonio = :patrimonio';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':patrimonio', $this->saida->__get('patrimonio'));
		$stmt->execute();


	}


}


?>