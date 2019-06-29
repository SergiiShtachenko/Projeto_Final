<style>
    <?php echo file_get_contents("css/produto.css"); ?>
    <?php echo file_get_contents("css/header.css"); ?>
    <?php echo file_get_contents("css/encomenda.css"); ?>
</style>
<script defer>
    <?php echo file_get_contents("js/prodList.js"); ?>
</script>

<a href="javascript: showHidePesquisa()"><img id="PesquiarImg" src="images/Pesquisar2.png" alt="Pesquisar"></a>
<section class="blocoDePesquisa">    
        <input type="text" class="linhaDePesquisa" onkeyup="filtrar()" placeholder="Pode procurar pelo reference, nome ou descritivo"/>
        <a href="javascript: showHidePesquisa()"><img id="fecharImg" src="images/fechar.png" alt="fchar"></a>
    
</section>

<section class = "lstEnc">
<article class="pageNome">LISTA DAS ENCOMENDAS: </article>
    
    
    <table id="tabSerch" class="itens">
        <tr class="head">
            <th width="120">Data enc.</th>
            <th width="120">Nr enc.</th>
            <th width="120">Data entrega</th>
            <th width="120">Resposavel</th>
            <th width="80">Nr Modelos</th>
            <th width="80">Total Qtd.</th>
            <th width="120">VALOR</th>
        </tr> 
<?php
    foreach($listaVer as $item){
?>
            
        <tr class="orProd"></tr>
            <td > <h5><?php echo $item->getDtEnc(); ?></h5> </td> 
            <td> <h5><?php echo $item->getNrEnc(); ?></h5> </td>
            <td> <h5><?php echo $item->getDtEntr(); ?></h5> </td> 
            <td> <h5><?php echo $item->getResponçavel(); ?></h5> </td> 
            <td> <h5><?php echo $item->getNrProd(); ?></h5> </td> 
            <td> <h5><?php echo $item->getQtdProd(); ?></h5> </td> 
            <td> <h5><?php echo $item->getValProd() . ' €'; ?></h5> </td>             
        
        </tr>


<?php
    }
?>


    </table>
</section>