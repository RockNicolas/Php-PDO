<?php
    if (isset($_POST["textIDR"])){
        $conexão = new PDO('myslq:host=localhost;dhname=test', $user,  $pass);

        $sql = "SELECT id FROM contas WHERE id = ".$_POST["txtIDD"];
        $query = $conexão->query($sql)->fetchAll();

        if(count($query) > 0){
            $sql = "SELECT id FROM contas WHERE id = ".$_POST["txtIDR"];
            $query = $conexão->query($sql)->fetchAll();
        
            if(count($query) > 0){
                    $sql = "SELECT saldo FROM contas WHERE id = ".$_POST["txtIDR"];
                    foreach($conexão->query($sql) as $row){
                        if($row["saldo"] >= $_POST["txtValor"]){
                            echo "Transferiancia OK!";
                        } else {
                            echo "Trasnnferencia Não Foi concluida";
                        }
                    }
            }
        }
    }

?>