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
                Olá <span id="userName"><?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?></span><a href="Logout.php">Sair</a>
            </section>
            <a href="https://www.toworkfor.pt"><img id="twfLogoMini" src="images/ToWorkFor - Logo.jpg" alt="ToWorkFor"></a>
            <!-- Navigação -->
            <nav class="topNav" id="topNavAD" role="navigation">            
                <ul class="navConteiner">
                    <li class="navEl"><a class="navLink" href="listaUsersVer.php">Utilizadores</a></li>
                    <li class="navEl"><a class="navLink" href="listaUsersVer.php">Clientes</a></li>
                    <li class="navEl"><a class="navLink" href="produto_list_ad.php">Produtos</a></li>
                    <li class="navEl"><a class="navLink" href="">Encomendas</a></li>
                </ul>                
            </nav>

        </header>