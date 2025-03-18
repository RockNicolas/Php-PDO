<?php
		if (isset($_POST["txtIDR"])){
			$conexao = new PDO('mysql:host=localhost;dbname=curso_pdo', "root", "");

			$sql = "SELECT id FROM contas WHERE id = ".$_POST["txtIDD"];
			$query = $conexao->query($sql)->fetchAll();	
			
			if (count($query) > 0){
				$sql = "SELECT id FROM contas WHERE id = ".$_POST["txtIDR"];
				$query = $conexao->query($sql)->fetchAll();	
				
				if (count($query) > 0){
						$sql = "SELECT saldo FROM contas WHERE id = ".$_POST["txtIDR"];
						foreach($conexao->query($sql) as $row){
							if ($row["saldo"] >= $_POST["txtValor"]){
								echo "Transferencia OK!";
							} else {
								echo "Transferencia NAO OK!";
							}
						}
				}			
			}
		}
?>