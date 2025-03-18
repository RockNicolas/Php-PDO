<h1>Transferir</h1>
<form action="trasferir-ok.php" method="POST">
<table width="100%" border="1">
<tr>
    <td width="20%">ID REMETENTE:</td>
    <td width="80%"><input type="text" value="<?php echo $GET["id"]?>" name="txtIDR"></td>
 </tr>

 <tr>
    <td width="20%">ID DESTINATARIO:</td>
    <td width="80%"><input type="text"  name="txtIDD"></td>
 </tr>
    
 <tr>
    <td width="20%">Valor:</td>
    <td width="80%"><input type="text" name="txtValor"></td>
 </tr>
</table>
</form>