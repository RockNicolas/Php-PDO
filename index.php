<h1>Banco De Dinheiro</h1>
<table width="100%" border="1">
<tr>
	<td>ID</td>
	<td>Cliente</td>
	<td>Saldo</td>
	<td>Transferir</td>
	<td>Apagar</td>
	<td>Editar</td>
</tr>
<?php
	try{
		$conexao = new PDO('mysql:host=localhost;dbname=curso_pdo', "root", "");

		$sql = "SELECT id, nome, saldo FROM contas ORDER BY id ASC";

		foreach($conexao->query($sql) as $row){
			echo "<tr>";
			echo "<td>".$row["id"]."</td>";
			echo "<td>".$row["nome"]."</td>";
			echo "<td>".$row["saldo"]."</td>";
			echo "<td><a href='transferir.php?id=".$row["id"]."'>Transferir Valor</td>";
			echo "<td><a href='apagar-conta.php?id=".$row["id"]."'>X</td>";
			echo "<td><a href='editar-conta.php?id=".$row["id"]."'>OK</td>";
			echo "</tr>";
		}

	} catch (PDOException $e){
		echo "Ocorreu um erro: ".$e->getMessage();	
	}
?>
</table>
<a href="nova-conta.php">Cadastrar</a>