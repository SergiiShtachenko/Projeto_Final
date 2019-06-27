<?php 
    //include ('produto_list_ad.php');    

    // include ('templates/cl_header.php');
    // include ('templates/produto_edit.php');
    // include ('templates/footer.php');
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>AMF - Plataforma on-line</title>

        <link rel="stylesheet" href="css/index.css">
       
    </head>

    <body> 
        
        <!--Pásina de Login-->
        <section class="conteudo">
            <article id="userArea">
                <a href="http://www.amfshoes.com/"><img class="imgLogo" src="images/logo AMF FC - payoff.jpg" alt="AMF Safety Shoes"></a>
                <form name="userAccess" action="" method="POST">
                    <label>Introduza o seu login e a senha:</label>
                    <br>
                    <input class="campo" type="name"name="user" size="30px" placeholder="nome@mail.pt" required="" onchange="validarCredenciais()">
                    <br>
                    <input class="campo" type="password" name="password" size="30px" placeholder="senha" required="">
                    <br>
                    <input class="campo" class="button" type="submit" value="Login">
                    
                    <span id="criarConta">Clique <a href="#registo">aqui</a> para criar conta</span>
                    <br>
                    <p id="error"></p> 
                </form>
                <a href="https://www.toworkfor.pt"><img class="imgTWF" src="images/ToWorkFor - Logo.jpg" alt="ToWorkFor"></a>
            </article>
            
            <aside id="promoSlider">        
                    
            </aside>
        </section>
        <footer>
            Build by Sergii & Pedro
        </footer>
        

    </body>
</html>


