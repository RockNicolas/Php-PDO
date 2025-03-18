<?php
	if (isset($_GET["id"])){
		
		$conexao = new PDO('mysql:host=localhost;dbname=curso_pdo', "root", "");

		$sql = "DELETE FROM contas WHERE id = :Id";

		$pstmQuery = $conexao->prepare($sql);

		$pstmQuery->bindParam(":Id", $_GET["id"], PDO::PARAM_INT);

		$pstmQuery->execute();

		if ($pstmQuery->rowCount() > 0){
				echo "Conta apagada com sucesso!";
		}
	}
?>