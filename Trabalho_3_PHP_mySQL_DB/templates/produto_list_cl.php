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

<aside class="totaisEnc">        
    <h3><span>Carrinho de compra:</span></h3>
    <h3>Total Qtd: <span><?php echo $noCarrinho['qtd']; ?></span></h3>
    <h3>Total Valor: <span><span><?php echo $noCarrinho['val']; ?> €</span></h3>
    <h3></h3>
    <form action="encomedna_edit.php" method="POST">                                            
            <input type="submit" value="Finalizar">
    </form> 
</aside>

<section class = "lstProdutosCl">
    
    <article class="pageNome">ESCOLHA O ARTIGO PARA ENCOMENDAR</article>
    
    <table class="orProductList">   

<?php
    foreach($listaVer as $item){
        if($item->getAtivo()){
?>

                <tr class="orProd">   
                        <td width="70"><img class="showProd" src="images/produtos/<?php echo $item->getFoto() . '.jpg'; ?>"></td>
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
                            <button type="button" id="<?php echo $item->getRef(); ?>_b" onclick="ordShow('<?php echo $item->getRef(); ?>')">Encomendar</button>
                        </td>                    
                </tr>
                <tr class="tamanhos">
                    <td colspan="5">
                        <form class="tmnForm" id="<?php echo $item->getRef(); ?>_f" action="action_add_to_order.php" method="POST">
                            <input type="hidden" name="guidPr" value="<?php echo $item->getGuid(); ?>">
                            <input type="hidden" name="guidLn" value="">
                            <input type="hidden" name="price" value="<?php echo $item->getPrice(); ?>">
                            <input class="orSize" name="T35" placeholder="35"size=3>
                            <input class="orSize" name="T36" placeholder="36"size=3>
                            <input class="orSize" name="T37" placeholder="37"size=3>
                            <input class="orSize" name="T38" placeholder="38"size=3>
                            <input class="orSize" name="T39" placeholder="39"size=3>
                            <input class="orSize" name="T40" placeholder="40"size=3>
                            <input class="orSize" name="T41" placeholder="41"size=3>
                            <input class="orSize" name="T42" placeholder="42"size=3>
                            <input class="orSize" name="T43" placeholder="43"size=3>
                            <input class="orSize" name="T44" placeholder="44"size=3>
                            <input class="orSize" name="T45" placeholder="45"size=3>
                            <input class="orSize" name="T46" placeholder="46"size=3>
                            <input class="orSize" name="T47" placeholder="47"size=3>
                            <input class="orSize" name="T48" placeholder="48"size=3>
                            <a href="javascript: ordShow('<?php echo $item->getRef(); ?>')"><img class="ordHide" src="images/dell.png" alt="Pesquisar"></a>
                            <input type="submit" value="Confirmar">  
                        </form>  
                    </td>
                </tr>
        

<?php
        }
    }
?>

    </table>
</section>