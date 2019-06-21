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
        protected $_price;
        protected $_ativo;

        public function __construct($guid, $ref, $nome, $descricao, $foto, $price, $ativo){
            $this->_guid = $guid;
            $this->_ref = $ref;
            $this->_nome = $nome;
            $this->_descricao = $descricao;
            $this->_foto = $foto;
            $this->_price = $price;
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
        //Foto
        public function getFoto(){ return $this->_foto; }
        //Preço
        public function getPrice(){ return $this->_price; }
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
            $listaPr[] = new Produto($row['guid'], $row['reference'], $row['nome'], $row['descricao'], $row['foto'], $row['price'], $row['ativo']);
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



<!------------templates------------>

<!-------header------->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>AMF - Plataforma on-line</title>      
        <style>
        <?php echo file_get_contents("css/produto.css"); ?>
        </style>
    </head>    
    <body>
<!-------fim header------->

<!-------lista_profutos.php------->
<?php
    
    foreach($listaVer as $item){
        if($item->getAtivo()){
?>
<section class = "lstProdutos">
    <table class="orProductList">
        <tr class="orProd">
            <td width="70"><img class="showProd" src="images/produtos/<?php echo $item->getFoto(); ?>"></td>
            <td width="80">
                <h3><?php echo $item->getNome(); ?></h3>
                <h5><?php echo $item->getRef(); ?></h5>
            </td>                    
            <td width="400">
                <h3>DESCRIÇÃO:</h3>
                <h4 class="yellowBGcolorDes"><?php echo $item->getDescr(); ?></h4>
            </td>
            <td width="80">
                <h3>PRICE</h3>
                <h4 class="yellowBGcolorPr"><?php echo $item->getPrice(). ' €'; ?></h4>
            </td>
            <td width="150">
                
                <button type="button" onclick="ordShow('ordPr1')">Encomendar</button>
            </td>
        </tr>
    </table>
</section>
<?php
        }
    }
?>
<!--footer-->
    </body>
</html>