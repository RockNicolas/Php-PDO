<h1>Banco dinheiro</h1>
<table width="100%" border="1">
<tr>
    <td>ID</td>
    <td>CLiente</td>
    <td>Ação</td>
    <td>Saldo</td>
    <td>Transferir</td>
</tr>
</table>

<?php
    try{
        $conexão = new PDO('myslq:host=localhost;dhname=test', $user,  $pass);

        $sql = "SELECT * FROM contas ORDER BY id ASC";

        foreach($conexão->query($sql) as $row){
            echo "<tr>";
            echo  "<td>".$row["id"]."<td>";
            echo  "<td>".$row["nome"]."<td>";
            echo  "<td>".$row["saldo"]."<td>";
            echo  "<td><a hreaf='transferir.php?id=".$row["id"]."'>Transferir Valor</td>";
            echo "</tr>";
        }

    } catch (PDOException $e){
        echo "Ocorreu um erro:" .$e->getMessage();
    }
?>