
<?php
  include ('config/init_p.php');
  //include ('database/users.php');
  //include ('novoCliente.php');
?>
          <link rel="stylesheet" href="css/registo.css">
          <script src="js/registo.js" defer></script>

  <!--Pásina de Registo-->
      <section class="RegistoNovoCliente">
          <article id="NovoCliente">
              <form name="registoCliente" action="novoCliente.php" method="POST">                  
                  <p class="Dados">
                      <input type="text" name="nome" placeholder="Nome da Empresa *" required="preenchimento obrigatório" ></p>
                      <p><input type="text" name="nif" placeholder="NIF *" required="preenchimento obrigatório" ></p>
                  <p class="Morada">
                      <input type="text" name="Morada" placeholder="Morada da empresa *" required="preenchimento obrigatório" ></p>
                  <p class="contacto">
                      <p><input type="tel" name="telefone" placeholder="contacto telefonico*" required="preenchimento obrigatório" ></p>
                  <h5>*campos de preenchimento obrigatório</h5>
                  <p><input type="submit" value="Enviar"></p>                
              </form>
          </article>
      </section>    
      
  
     
