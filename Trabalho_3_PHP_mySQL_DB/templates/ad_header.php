<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>AMF - Plataforma on-line</title>      
        <style>
            <?php echo file_get_contents("css/produto.css"); ?>
            <?php echo file_get_contents("css/header.css"); ?>
        </style>
        <script defer>
            <?php echo file_get_contents("js/header.js"); ?>
        </script>
    </head>    
    <body>
        <header>
            <section id="yellowLine">
                Olá <span id="userName">nome</span><a href="#">Sair</a>
            </section>
            <a href="https://www.toworkfor.pt"><img id="twfLogoMini" src="images/ToWorkFor - Logo.jpg" alt="ToWorkFor"></a>
            <!-- Navigação -->
            <nav class="topNav" id="topNavAD" role="navigation">            
                <ul class="navConteiner">
                    <li class="navEl"><a class="navLink" href="#clients">Utilizadores</a></li>
                    <li class="navEl"><a class="navLink" href="#product">Clientes</a></li>
                    <li class="navEl"><a class="navLink" href="#price">Produtos</a></li>
                    <li class="navEl"><a class="navLink" href="#alloredes">Encomendas</a></li>
                </ul>                
            </nav>

        </header>