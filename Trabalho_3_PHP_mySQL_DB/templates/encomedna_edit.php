
<script defer>
    <?php echo file_get_contents("js/prodList.js"); ?>
</script>

<a href="javascript: showHidePesquisa()"><img id="PesquiarImg" src="images/Pesquisar2.png" alt="Pesquisar"></a>
<section class="blocoDePesquisa">    
        <input type="text" class="linhaDePesquisa" onkeyup="filtrar()" placeholder="Pode procurar pelo reference, nome ou descritivo"/>
        <a href="javascript: showHidePesquisa()"><img id="fecharImg" src="images/fechar.png" alt="fchar"></a>
    
</section>

<section class = "lstProdutos">
    
    <table class="fimEnc">
    <form action="action_fim_order.php" method="POST">
        <tr>
            <td> <article class="pageNome">ENCOMENDA: </article> </td>
            <td> <input type="text" name="nrEnc" placeholder="Nº da encomenda" required="preenchimento obrigatório" maxlength="15"> </td>
            <td> <input type="date" name="data" required="preenchimento obrigatório"> </td>
            <td>
                <input type="hidden" name="guidPr" value="">
                <input type="submit" value="Finalizar encomenda">
            </td>
        </tr>
    </form>
    </table>
    <table class="itens">
        <tr class="head">
            <th>Imagem</th>
            <th width="80">Ref.</th>
            <th width="100">Nome</th>
            <th width="50">35</th>
            <th width="50">36</th>
            <th width="50">37</th>
            <th width="50">38</th>
            <th width="50">39</th>
            <th width="50">40</th>
            <th width="50">41</th>
            <th width="50">42</th>
            <th width="50">43</th>
            <th width="50">44</th>
            <th width="50">45</th>
            <th width="50">46</th>
            <th width="50">47</th>
            <th width="50">48</th>
        </tr> 
<?php
    foreach($enc->getLstProd() as $item){
?>
            <tr class="orProd"></tr>
                <td><img class="showProd" src="images/produtos/<?php echo $item->getFoto() . '.jpg'; ?>"></td>
                <td >                
                    <h5><?php echo $item->getRef(); ?></h5>
                </td> 
                <td>                
                    <h5><?php echo $item->getNome(); ?></h5>
                </td>
                <form action="action_add_to_order.php" method="POST">
                    <input type="hidden" name="guidPr" value="<?php echo $item->getGuid(); ?>">
                    <input type="hidden" name="guidLn" value="<?php echo $item->getFoto(); ?>">
                    <input type="hidden" name="price" value="<?php echo $item->getPrice(); ?>">
                    <td><input class="orSize" name="T35" size=3 value="<?php echo $item->getLstTamanhos()['35']; ?>"></td>
                    <td><input class="orSize" name="T36" size=3 value="<?php echo $item->getLstTamanhos()['36']; ?>"></td>
                    <td><input class="orSize" name="T37" size=3 value="<?php echo $item->getLstTamanhos()['37']; ?>"></td>
                    <td><input class="orSize" name="T38" size=3 value="<?php echo $item->getLstTamanhos()['38']; ?>"></td>
                    <td><input class="orSize" name="T39" size=3 value="<?php echo $item->getLstTamanhos()['39']; ?>"></td>
                    <td><input class="orSize" name="T40" size=3 value="<?php echo $item->getLstTamanhos()['40']; ?>"></td>
                    <td><input class="orSize" name="T41" size=3 value="<?php echo $item->getLstTamanhos()['41']; ?>"></td>
                    <td><input class="orSize" name="T42" size=3 value="<?php echo $item->getLstTamanhos()['42']; ?>"></td>
                    <td><input class="orSize" name="T43" size=3 value="<?php echo $item->getLstTamanhos()['43']; ?>"></td>
                    <td><input class="orSize" name="T44" size=3 value="<?php echo $item->getLstTamanhos()['44']; ?>"></td>
                    <td><input class="orSize" name="T45" size=3 value="<?php echo $item->getLstTamanhos()['45']; ?>"></td>
                    <td><input class="orSize" name="T46" size=3 value="<?php echo $item->getLstTamanhos()['46']; ?>"></td>
                    <td><input class="orSize" name="T47" size=3 value="<?php echo $item->getLstTamanhos()['47']; ?>"></td>
                    <td><input class="orSize" name="T48" size=3 value="<?php echo $item->getLstTamanhos()['48']; ?>"></td>
                    <th> <input type="submit" value="Editar"></th>
                </form>
            
            </tr>


<?php
    }
?>


    </table>
</section>