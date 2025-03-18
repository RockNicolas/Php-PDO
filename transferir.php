<h1>Transferir</h1>
<form action="transferir-ok.php" method="POST">
<table width="50%" border="1">
<tr>
	<td width="20%">ID Remetente:</td>
	<td width="80%"><input type="text" value="<?php echo $_GET["id"]?>" name="txtIDR"></td>
</tr>
<tr>
	
</tr>
<tr>
	<td width="20%">ID Destinatario:</td>
	<td width="80%"><input type="text" name="txtIDD"></td>
</tr>
<tr>
	
</tr>
<tr>
	<td width="20%">Valor:</td>
	<td width="80%"><input type="text" name="txtValor"></td>
</tr>
<tr>
	
</tr>
<tr>
	<td width="20%"></td>
	<td width="80%"><input type="submit" value="Transferir"></td>
</tr>
</form>

