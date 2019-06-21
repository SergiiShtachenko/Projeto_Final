<?php
    // Config
    include ('config/init.php');

    // Models
    class Produto {
        protected $_guid;
        protected $_ref;
        protected $_nome;
        protected $_descricao;
        protected $_foto;
        protected $_ativo;

        public function __construct($guid, $ref, $nome, $descricao, $foto, $ativo){
            $this->_guid = $guid;
            $this->_ref = $ref;
            $this->_nome = $nome;
            $this->_descricao = $descricao;
            $this->_foto = $foto;
            $this->_ativo = $ativo;
        }

        //Guid
        public function getGuid(){ return $this->_guid; }
        //Ref
        public function getRef(){  return $this->_ref; }
        //Nome
        public function getNome(){  return $this->_nome; }
        //Descrição
        public function getDescr(){ return $this->_descricao; }
        //foto
        public function getFoto(){ return $this->_foto; }
        //Ativo
        public function getAtivo(){ return $this->_ativo; }

    }
?>



<?php
    //database
    function getAllProdutos(){
        global $dblink;

        $stmt = $dblink->prepare('SELECT * FROM produto');
        $stmt->execute();

        //return $stmt->fetchAll();
        
        while($row = $stmt->fetch()){
            $listaPr[] = new Produto($row['guid'], $row['reference'], $row['nome'], $row['descricao'], $row['foto'], $row['ativo']);
        }
        return $listaPr;
    }

?>

<?php
    //action_listar_prodytos.php

    //include
    //include    
    $listaVer = getAllProdutos();
    //include
    //include
?>


<!-------templates------->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>AMF - Plataforma on-line</title>      
        <link rel="stylesheet" href="/css/produto.css">
    </head>

    <body>
        <table class="orProductList">
            <tr class="orProd">
                <td><img src="img/product/low/prdXf1.jpg"></td>
                <td>
                    <h3>X-O2</h3>
                    <h5>8A01.20</h5>
                </td>                    
                <td>
                    <h3>DESCRIÇÃO:</h3>
                    <h4 class="yellowBGcolor">S3 | SRC | HRO</h4>
                </td>
                <td>
                    <h3>PRICE</h3>
                    <h4 class="yellowBGcolor">33,50€</h4>
                </td>
                <td>
                    
                    <button type="button" onclick="ordShow('ordPr1')">Encomendar</button>
                </td>
            </tr>
        </table>
    </body>
</html>

<?php
    
    foreach($listaVer as $item){
        echo $item->getRef();
        echo '   ';
        echo $item->getNome();
        
        echo '<br>';
    }
    

?>