<script defer>
    <?php echo file_get_contents("js/prodList.js"); ?>
</script>

<a href="javascript: showHidePesquisa()"><img id="PesquiarImg" src="images/Pesquisar2.png" alt="Pesquisar"></a>
<section class="blocoDePesquisa">
    
        <input type="text" class="linhaDePesquisa" onkeyup="filtrar()" placeholder="Pode procurar pelo reference, nome ou descritivo"/>
        <a href="javascript: showHidePesquisa()"><img id="fecharImg" src="images/fechar.png" alt="fchar"></a>
    
</section>

<section class = "lstProdutos">
    <article class="pageNome">LISTA DOS ARTIGOS</article>
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
                <form action="action_teste.php" method="POST">
                    <input type="hidden" name="Produto" value="<?php echo $item;?>">
                    <input type="submit" value="Editar artigo">
                </form>
            </td>
        </tr>


<?php
        }
    }
?>


    </table>
</section>