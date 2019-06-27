<?php
    //database
    function getAllClients(){
        //include ('../config/init_p.php');
        //include ('../models/cliente.php');
        global $dblink;
        $stmt = $dblink->prepare('SELECT * FROM cliente');
        $stmt->execute();

        //return $stmt->fetchAll();
        
        while($row = $stmt->fetch()){
            $listaClients[] = new Cliente($row['guid'], $row['nrcliente'], $row['nome'], $row['nif'], $row['morada'], $row['telefon'], $row['ativo']);
            
        }
        return $listaClients;
    }            
?>
