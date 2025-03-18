<?php
		if (isset($_POST["txtIDR"])){
			$conexao = new PDO('mysql:host=localhost;dbname=curso_pdo', "root", "");

			$sql = "SELECT COUNT(*) FROM contas WHERE id = ".$_POST["txtIDD"];
			$query = $conexao->query($sql);	
			
			if ($query->fetchColumn() > 0){
				$sql = "SELECT COUNT(*) FROM contas WHERE id = ".$_POST["txtIDR"];
				$query = $conexao->query($sql);	
				
				if ($query->fetchColumn() > 0){
						$sql = "SELECT saldo FROM contas WHERE id = ".$_POST["txtIDR"];
						foreach($conexao->query($sql) as $row){
							if ($row["saldo"] >= $_POST["txtValor"]){
								
								// Retirar
								$updateRemetenteSQL = "UPDATE contas SET saldo = saldo - ".$_POST["txtValor"]." WHERE id = ".$_POST["txtIDR"];
								$updateRemetenteQuery = $conexao->query($updateRemetenteSQL);

								if ($updateRemetenteQuery->rowCount() > 0){

									// Adicionar
									$updateDestinatarioSQL = "UPDATE contas SET saldo = saldo + ".$_POST["txtValor"]." WHERE id = ".$_POST["txtIDD"];
									$updateDestinatarioQuery = $conexao->query($updateDestinatarioSQL);

									if ($updateDestinatarioQuery->rowCount() > 0){
										echo "Transferencia realizada com sucesso!";
									}
								} else {
									echo "Ocorreu um erro!";
								}

							} else {
								echo "Transferencia NAO OK!";
							}
						}
				}			
			}
		}
?>