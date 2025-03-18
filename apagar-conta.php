<?php
    if(isset($_GET["id"])){

        $sql = "SELECT COUNT(*) FROM contas WHERE id = :Destinado";
        $prepareQuery = $conexão->prepare($sql);
        $prepareQuery->bindParam(":Destinado", $_POST["txtIDD"]
        , PDO:: PARAM_INT);
        $prepareQuery->execute();

        if(count($query) > 0){
            $sql = "SELECT id FROM contas WHERE id = ".$_POST["txtIDR"];
            $prepareQuery = $conexão->prepare($sql);
            $prepareQuery->bindParam(":Destinado", $_POST["txtIDD"]
            , PDO:: PARAM_INT);
            $prepareQuery->execute();
        }
    }
?>