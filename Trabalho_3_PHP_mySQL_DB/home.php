<?php 
    include ('config/init_p.php');
    include ('models/produto.php');
    include ('database/produto.php');
    include ('database/usersList.php');
    include ('models/utilizador.php');
?>
<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8"/>
        <title>AMF - Plataforma on-line</title>

        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/order.css">    
        <!-- <link rel="stylesheet" href="css/registo.css"> -->
        <!-- <link rel="stylesheet" href="css/clients.css"> -->
        <!-- <link rel="stylesheet" href="css/editarDados.css"> -->

        <script src="js/index.js" defer></script>  
        <script src="js/login.js" defer></script> 
        <script src="js/order.js" defer></script>
        <script src="js/registo.js" defer></script>
        <script src="js/clients.js" defer></script>
        <script src="js/editarDados.js" defer></script>

        <!-- ANGULAR -->
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular-route.js"></script>

        <!-- jQuery -->
        <script src="http://ma5slider.ma5.pl/js/jquery.min.js" defer></script>
        <!-- jQuery UI mouse draggable widget -->
        <script src="http://ma5slider.ma5.pl/js/jquery-ui.min.js" defer></script>
        <!-- Touch Event Support for jQuery UI -->
        <script src="http://ma5slider.ma5.pl/js/jquery.ui.touch-punch.min.js" defer></script>
        <!-- MA5 Slider -->
        <link href="http://ma5slider.ma5.pl/css/ma5slider.min.css" rel="stylesheet" type="text/css">
        <script src="http://ma5slider.ma5.pl/js/ma5slider.min.js" defer></script>        
        <script>  $(window).on('load', function () {$('.ma5slider').ma5slider();}); </script>
        <!-- Fim jQuery -->
    </head>

    <body ng-controller="mainController"> <!-- definir Controller -->
        <header>
            <section id="yellowLine">
                Olá <span id="userName">nome</span><a href="#">Sair</a>
            </section>
            <a href="https://www.toworkfor.pt"><img id="twfLogoMini" src="img/ToWorkFor - Logo.jpg" alt="ToWorkFor"></a>
            <!-- Navigação -->
            <nav class="topNav" id="topNavCL" role="navigation">            
                <ul class="navConteiner">
                    <li class="navEl"><a class="navLink" href="#order">Encomendar</a></li>
                    <li class="navEl"><a class="navLink" href="#pending">Encomendas pendentes</a></li>
                    <li class="navEl"><a class="navLink" href="#history">Histórico das encomendas</a></li>
                    <li class="navEl"><a class="navLink" href="#editDates">Alterar dados</a></li>
                </ul>
            </nav>
            <nav class="topNav" id="topNavAD" role="navigation">            
                <ul class="navConteiner">
                    <li class="navEl"><a class="navLink" href="#clients">Gerir clientes</a></li>
                    <li class="navEl"><a class="navLink" href="#product">Geriri produtos</a></li>
                    <li class="navEl"><a class="navLink" href="#price">Listas de preços</a></li>
                    <li class="navEl"><a class="navLink" href="#alloredes">Ver encomendas</a></li>
                </ul>
            </nav>
        </header>
        <section id="main">
            
            <!-- Contente das páginas será apresentado aqui -->
            <article ng-view class="contentor"></article>

        </section>
        <footer>
            Build by Sergii & Pedro
        </footer>
        

    </body>
</html>
<?php
    include ('templates/tpl_userList.php');
    include ('templates/cl_header.php');
    include ('templates/cl_produtoList.php');
    include ('templates/footer.php');
    
    
?>