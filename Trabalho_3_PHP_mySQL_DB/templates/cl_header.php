<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>AMF - Plataforma on-line</title>      
        <style>
        <?php echo file_get_contents("css/produto.css"); ?>
        <?php echo file_get_contents("css/header.css"); ?>
        </style>
        <script>
        <?php echo file_get_contents("js/header.css"); ?>
        </script>  
    </head>    
    <body>
        <header>
            <section id="yellowLine">
                Olá <span id="userName">nome</span><a href="#">Sair</a>
            </section>
            <a href="https://www.toworkfor.pt"><img id="twfLogoMini" src="images/ToWorkFor - Logo.jpg" alt="ToWorkFor"></a>
            <!-- Navigação -->
            <nav class="topNav" id="topNavCL" role="navigation">            
                <ul class="navConteiner">
                    <li class="navEl"><a class="navLink" href="#order">Produtos</a></li>
                    <li class="navEl"><a class="navLink" href="#pending">Encomendas</a></li>
                    <li class="navEl"><a class="navLink" href="#editDates">Alterar dados</a></li>
                </ul>
            </nav>
        </header>