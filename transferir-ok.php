<?php
		if (isset($_POST["txtIDR"])){
				$conexao = new PDO('mysql:host=localhost;dbname=curso_pdo', "root", "");
			try {
					$conexao->beginTransaction();
					$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$sql = "SELECT COUNT(*) FROM contas WHERE id = :Destinatario";
					$prepareQuery = $conexao->prepare($sql);
					$prepareQuery->bindParam(":Destinatario", $_POST["txtIDD"], PDO::PARAM_INT);
					$prepareQuery->execute();	

					if ($prepareQuery->fetchColumn() > 0){
						
						$prepareQuery->closeCursor();

						$sql = "SELECT COUNT(*) FROM contas WHERE id = :Remetente";
						$prepareQuery = $conexao->prepare($sql);
						$prepareQuery->bindParam(":Remetente", $_POST["txtIDR"], PDO::PARAM_INT);
						$prepareQuery->execute();		
						
						if ($prepareQuery->fetchColumn() > 0){
								$prepareQuery->closeCursor();

								$sql = "SELECT saldo FROM contas WHERE id = :Remetente";
								$prepareQuery = $conexao->prepare($sql);
								$prepareQuery->bindParam(":Remetente", $_POST["txtIDR"], PDO::PARAM_INT);
								$prepareQuery->execute();

								if ($row = $prepareQuery->fetch(PDO::FETCH_ASSOC)){
									if ($row["saldo"] >= $_POST["txtValor"]){
										
										// Retirar
										$updateRemetenteSQL = "UPDATE contas SET saldo = saldo - :txtValor WHERE id = :Remetente";
										
										$updateRemetentePrepareQuery = $conexao->prepare($updateRemetenteSQL);

										$updateRemetentePrepareQuery->bindParam(":txtValor", $_POST["txtValor"], PDO::PARAM_STR);

										$updateRemetentePrepareQuery->bindParam(":Remetente", $_POST["txtIDR"], PDO::PARAM_INT);

										$updateRemetentePrepareQuery->execute();

										if ($updateRemetentePrepareQuery->rowCount() > 0){
											// Adicionar
											$updateDestinatarioSQL = "UPDATE contas SET saldo = saldo + :txtValor WHERE id = :Destinatario";
											
											$updateDestinatarioPrepareQuery = $conexao->prepare($updateDestinatarioSQL);

											$updateDestinatarioPrepareQuery->bindParam(":txtValor", $_POST["txtValor"], PDO::PARAM_STR);

											$updateDestinatarioPrepareQuery->bindParam(":Destinatario", $_POST["txtIDD"], PDO::PARAM_INT);

											$updateDestinatarioPrepareQuery->execute();

											if ($updateDestinatarioPrepareQuery->rowCount() > 0){
													if ($conexao->commit()){
															echo "Transferencia realizada com sucesso!";
														}
											}
										}

									}
							}
						}			
					}
				} catch (Exception $e) {
					$conexao->rollBack();
					echo "ROLLBACK!";
			}
	}
?>