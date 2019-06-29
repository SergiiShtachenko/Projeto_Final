<?php
    function verifyAdmin($guid){
        global $dblink;
        $stmt = $dblink->prepare('SELECT permissao FROM utilizador WHERE guid = ?');
        $stmt->execute(array($guid));

        $permissao = 0;

        while($row = $stmt->fetch()){
            $permissao = $row['permissao'];
        }
        
        return $permissao;
    }            
?>