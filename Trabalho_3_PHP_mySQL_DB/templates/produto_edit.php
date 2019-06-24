<section class="alterProduto">
    <article class="pageNome">CRIAR ARTIGO</article>
    <article id="alterPr">
        <table>
            <tr>
                <td>
                    <form name="alterProduto" action="action_produto_edit.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="guidPr" value="">
                            <p>
                                <input type="text" name="refPr" placeholder="Reference do artigo *" required="preenchimento obrigatório">
                                <input type="text" name="nomePr" placeholder="Nome do artigo *" required="preenchimento obrigatório" maxlength="15">
                                <input type="number" name="pricePr" step="0.01" min="0" placeholder="Preço do artigo *" required="preenchimento obrigatório" maxlength="15">
                            </p>
                            <p>
                                <input type="text" name="descPr" placeholder="Descritivo do artigo *" required="preenchimento obrigatório">
                                <label class="uploadFile">
                                    <input type="file" name="fotoPr" accept=".gif,.jpg,.jpeg,.png" onchange="showFile()">
                                    Foto do Artigo
                                </label>
                            </p>
                            <p><input type="submit" value="Enviar" onclick="return validarPass()"></p>
                        </form>
                </td>
                <td>
                    <img class="swowFoto" src="images/produtos/No_image.png" height="150"  alt="Image preview...">
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
            img.src = "images/produtos/No_image.png";
        }
    }            
</script>