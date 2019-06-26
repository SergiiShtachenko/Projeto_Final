
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
        <tr>
            <td>
                <article class="pageNome">LISTA DOS ARTIGOS</article>
            </td>
            <td>
                <form action="produto_edit.php" method="POST">
                    <input type="hidden" name="guidPr" value="">
                    <input type="submit" value="Finalizar encomenda">
                </form>
            </td>
        </tr>
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
    foreach($listaVer as $item){
        if($item->getAtivo()){
?>


            <tr class="orProd"></tr>
                <td><img class="showProd" src="images/produtos/8A3010.jpg"></td>
                <td >                
                    <h5>8A00.00</h5>
                </td> 
                <td>                
                    <h5>Nomeeee ee</h5>
                </td>
                <form action="action_produto_del.php" method="POST"></form>
                    <input type="hidden" name="guidCr" value="<?php echo $item->getGuid();?>">
                    <input type="hidden" name="guidPr" value="<?php echo $item->getGuid();?>">
                    <td><input class="orSize" name="T35" size=3></td>
                    <td><input class="orSize" name="T36" size=3></td>
                    <td><input class="orSize" name="T37" size=3></td>
                    <td><input class="orSize" name="T38" size=3></td>
                    <td><input class="orSize" name="T39" size=3></td>
                    <td><input class="orSize" name="T40" size=3></td>
                    <td><input class="orSize" name="T41" size=3></td>
                    <td><input class="orSize" name="T42" size=3></td>
                    <td><input class="orSize" name="T43" size=3></td>
                    <td><input class="orSize" name="T44" size=3></td>
                    <td><input class="orSize" name="T45" size=3></td>
                    <td><input class="orSize" name="T46" size=3></td>
                    <td><input class="orSize" name="T47" size=3></td>
                    <td><input class="orSize" name="T48" size=3></td>
                    <th> <input type="submit" value="Editar"></th>
                </form>
            
            </tr>


<?php
        }
    }
?>


    </table>
</section>