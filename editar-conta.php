<?php
		$conexao = new PDO('mysql:host=localhost;dbname=curso_pdo', "root", "");

		$sql = "SELECT id, nome, saldo FROM contas WHERE id = :Id";
		$prepareQuery = $conexao->prepare($sql);
		$prepareQuery->bindParam(":Id", $_GET["id"], PDO::PARAM_INT);
		$prepareQuery->execute();

		if ($row = $prepareQuery->fetch(PDO::FETCH_ASSOC)){
?>
<h1>Editar Conta</h1>
<form action="editar-conta-ok.php" method="POST">
<table width="50%" border="1">
<tr>
	<td width="20%">ID:</td>
	<td width="80%"><input type="text" readonly="readonly" name="txtID" value="<?php echo $row["id"];?>"></td>
</tr>
<tr>
	<td width="20%">Nome:</td>
	<td width="80%"><input type="text" name="txtNome" value="<?php echo $row["nome"];?>"></td>
</tr>
<tr>
	
</tr>
<tr>
	<td width="20%">Saldo:</td>
	<td width="80%"><input type="text" name="txtSaldo" value="<?php echo $row["saldo"];?>"></td>
</tr>
<tr>
	
</tr>
<tr>
	<td width="20%"></td>
	<td width="80%"><input type="submit" value="Editar"></td>
</tr>
</form>
<?php } ?>
