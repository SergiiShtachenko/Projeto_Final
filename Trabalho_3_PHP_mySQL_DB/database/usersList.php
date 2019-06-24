<?php
    //database
    function getAllUtilizador(){
        include ('../config/init_p.php');
        include ('../models/utilizador.php');

        $stmt = $dblink->prepare('SELECT * FROM utilizador');
        $stmt->execute();

        //return $stmt->fetchAll();
        
        while($row = $stmt->fetch()){
            $listaUser[] = new Utilizador($row['guid'], $row['email'], $row['palavrapasse'], $row['nome'], $row['telefon'], $row['cliente'],  $row['permissao'], $row['ativo']);
            //$listaUser=array($row['guid'], $row["email"], $row["palavrapasse"], $row["nome"], $row["telefon"], $row["cliente"], $row["permissao"], $row["ativo"]); 
            
        
        }
        return $listaUser;
    }            
?>
