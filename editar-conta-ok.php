<?php
	if (isset($_POST["txtID"])){
		
		$conexao = new PDO('mysql:host=localhost;dbname=curso_pdo', "root", "");

		$sql = "UPDATE contas SET nome = :Nome, saldo = :Saldo WHERE id = :ID";

		$pstmQuery = $conexao->prepare($sql);

		$pstmQuery->bindParam(":Nome", $_POST["txtNome"], PDO::PARAM_STR);

		$pstmQuery->bindParam(":Saldo", $_POST["txtSaldo"], PDO::PARAM_STR);

		$pstmQuery->bindParam(":ID", $_POST["txtID"], PDO::PARAM_INT);

		$pstmQuery->execute();

		if ($pstmQuery->rowCount() > 0){
				echo "Conta editada com sucesso!";
		}
	}
?>