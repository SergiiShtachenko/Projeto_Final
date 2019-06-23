<?php
  include ('config/init_p.php');

?>


<section class="RegistoNovoUser">
        <article id="NovoUser">
            <form name="registoUtilizador" action="novoUser.php" method="POST">
                <p class="Username">
                   <input type="email" name="email" placeholder="Email *"required="preenchimento obrigatório"></p>
                <p class="Password">
                    <input type="password" name="password" placeholder="Password *" required="preenchimento obrigatório" > <input type="password" name="repeatpassword" placeholder="Repita a sua password *" required="preenchimento obrigatório" ></p>
                <p class="Dados">
                    <input type="text" name="nome" placeholder="Nome da Empresa *" required="preenchimento obrigatório" ></p>                    
                <p class="Telefon">
                    <input type="tel" name="Telefone" placeholder="Número de telefone *" required="preenchimento obrigatório" maxlength="9"></p>                
                <h5>*campos de preenchimento obrigatório</h5>
                <p><input type="submit" value="Enviar" onclick="return validarPass()"></p>                
            </form>
        </article>
    </section> 
 
<?php    
include ('models/utilizador.php')

$utilizador= new Utilizador (null, $_POST['email'], $_POST['palavrapasse'], $_POST['nome'], $_POST['telefon'], $_POST['cliente'], $_POST['permissao'], $_POST['ativo'])

  $username = $_POST['email'];
  $password = $_POST['palavrapasse'];

  createUser($username, $password);



  //header ('Location: list_categories.php');
  ?>