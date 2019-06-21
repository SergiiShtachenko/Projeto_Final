<section class = "lstProdutos">
    <table class="orProductList">
<?php
    
    foreach($listaVer as $item){
        if($item->getAtivo()){
?>
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
<?php
        }
    }
?>
    </table>
</section>