<?php
		$conexao = new PDO('mysql:host=localhost;dbname=curso_pdo', "root", "");

		$sql = "UPDATE contas SET nome = :Nome, saldo = :Saldo WHERE id = :ID";

		$conexao->beginTransaction();

		$pstmQuery = $conexao->prepare($sql);

		$nome = "RL System";
		$saldo = 10;
		$id = 5;

		$pstmQuery->bindParam(":Nome", $nome, PDO::PARAM_STR);

		$pstmQuery->bindParam(":Saldo", $saldo, PDO::PARAM_STR);

		$pstmQuery->bindParam(":ID", $id, PDO::PARAM_INT);

		$pstmQuery->execute();

		$conexao->commit();
		//$conexao->rollBack();
?>