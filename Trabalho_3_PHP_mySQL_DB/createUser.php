<?php
  include ('config/init_p.php');

?>
        <link rel="stylesheet" href="css/registo.css">
        <script src="js/registo.js" defer></script>
<section class="RegistoNovoUser">
        <article id="NovoUser">
            <form name="registoUtilizador" action="novoUser.php" method="POST">
                <p class="Username">
                   <input type="email" name="email" placeholder="Email *"required="preenchimento obrigatório"></p>
                <p class="Password">
                    <input type="password" name="password" placeholder="Password *" required="preenchimento obrigatório" ><br><br>
                    <input type="password" name="repeatpassword" placeholder="Repita a sua password *" required="preenchimento obrigatório" ></p>
                <p class="Dados">
                    <input type="text" name="nome" placeholder="Nome *" required="preenchimento obrigatório" ></p>                    
                <p class="Telefon">
                    <input type="tel" name="Telefone" placeholder="Número de telefone *" required="preenchimento obrigatório" maxlength="9"></p>                
                <h5>*campos de preenchimento obrigatório</h5>
                <p><input type="submit" value="Enviar" onclick="return validarPass()"></p>                
            </form>
        </article>
    </section> 
 
<?php    
include ('models/utilizador.php')


  ?>