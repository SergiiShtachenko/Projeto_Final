<style>
    <?php echo file_get_contents("css/produto.css"); ?>
    <?php echo file_get_contents("css/header.css"); ?>
    <?php echo file_get_contents("css/encomenda.css"); ?>
</style>

<section class="alterProduto">
    <article class="pageNome">        
        <?php 
            if($prod->getGuid() == "") echo 'CRIAR ARTIGO';
            else echo 'EDITAR ARTIGO';
        ?>
    </article>
    <article id="alterPr">
        <table>
            <tr>
                <td>
                    <form name="alterProduto" action="action_produto_edit.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="guidPr" value="<?php echo $prod->getGuid();?>">
                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" required="Foto demasiado grande">
                            <p>
                                <input type="text" name="refPr" value="<?php echo $prod->getRef(); ?>" placeholder="Reference do artigo *" required="preenchimento obrigatório">
                                <input type="text" name="nomePr" value="<?php echo $prod->getNome(); ?>" placeholder="Nome do artigo *" required="preenchimento obrigatório" maxlength="15">
                                <input type="number" name="pricePr" value="<?php echo $prod->getPrice(); ?>" step="0.01" min="0" placeholder="Preço do artigo *" required="preenchimento obrigatório" maxlength="15">
                            </p>
                            <p>
                                <input type="text" name="descPr" value="<?php echo $prod->getDescr(); ?>" placeholder="Descritivo do artigo *" required="preenchimento obrigatório">
                                <label class="uploadFile">
                                    <input type="file" name="fotoPr" accept=".gif,.jpg,.jpeg,.png" onchange="showFile()">
                                    Foto do Artigo
                                </label>
                            </p>
                            <p>
                                <input type="submit" value="Enviar" onclick="return validarPass()">    
                                <a style="margin-left: 10px;" href="produto_list_ad.php"><img id="fecharImg" src="images/fechar.png" alt="fchar"></a>
                            </p>
                        </form>
                </td>
                <td>
                    <img class="swowFoto" src="images/produtos/<?php if ($prod->getFoto() != "") echo $prod->getFoto() . '.jpg'; else  echo 'no_image.jpg'; ?>" height="150"  alt="Image preview...">
                </td>                
            </tr>
        </table>
    </article>
</section>
<script>
    function showFile(){
        var img = document.querySelector(".swowFoto");
        var file = document.querySelector('input[type=file]').files[0];
        
        var fileReader = new FileReader();
        fileReader.onloadend = function () {
            img.src = fileReader.result;
        }

        if (file) {
            fileReader.readAsDataURL(file);
        } else {
            img.src = "images/produtos/<?php echo $prod->getFoto() . '.jpg'; ?>";
        }
    }            
</script>