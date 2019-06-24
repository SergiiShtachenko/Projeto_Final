<script defer>
    <?php echo file_get_contents("js/prodList.js"); ?>
</script>

<a href="javascript: showHidePesquisa()"><img id="PesquiarImg" src="images/Pesquisar2.png" alt="Pesquisar"></a>
<section class="blocoDePesquisa">    
        <input type="text" class="linhaDePesquisa" onkeyup="filtrar()" placeholder="Pode procurar pelo reference, nome ou descritivo"/>
        <a href="javascript: showHidePesquisa()"><img id="fecharImg" src="images/fechar.png" alt="fchar"></a>
    
</section>

<section class = "lstProdutos">
    <table class="headePage">
        <tr>
            <td>
                <article class="pageNome">LISTA DOS ARTIGOS</article>
            </td>
            <td>
                <form action="produto_edit.php" method="POST">
                    <input type="hidden" name="guidPr" value="">
                    <input type="submit" value="">
                </form>
            </td>
        </tr>
    </table>
    
    
    <table class="orProductList">   
<?php
    foreach($listaVer as $item){
        if($item->getAtivo()){
?>


        <tr class="orProd">
            <td width="70"><img class="showProd" src="images/produtos/<?php echo $item->getFoto() . '.jpg'; ?>"></td>
            <td >
                <h3><?php echo $item->getNome(); ?></h3>
                <h5><?php echo $item->getRef(); ?></h5>
            </td>                    
            <td >
                <h3>DESCRIÇÃO:</h3>
                <h4 class="yellowBGcolorDes"><?php echo $item->getDescr(); ?></h4>
            </td>
            <td >
                <h3>PRICE</h3>
                <h4 class="yellowBGcolorPr"><?php echo $item->getPrice(). ' €'; ?></h4>
            </td>
            <td >
                <form action="produto_edit.php" method="POST">
                    <input type="hidden" name="guidPr" value="<?php echo $item->getGuid();?>">
                    <input type="submit" value="Editar artigo">
                </form>
            </td>
            <td  class="delProduto">
                <form action="action_produto_del.php" method="POST">
                    <input type="hidden" name="guidPr" value="<?php echo $item->getGuid();?>">
                    <input type="submit" value="">
                </form>
            </td>   
        </tr>


<?php
        }
    }
?>


    </table>
</section>
