<link rel="stylesheet" href="../css/clients.css">
    <script src="../js/clients.js"></script>
<!-------fim header------->
<?php  include ('../listaUsersVer.php'); ?>
<!-------lista_utilizadores.php------->
<section>
  <h1>Utilizadores</h1>
  <table id="clients">
  <tr>
  <th><input type="text" id="Nome" onkeyup="procuraNome()" placeholder="Pesquisa"></th>
  <th><input type="submit" value="Pesquisar"></th>            
  <th><a href="https://www.toworkfor.pt"><img class="twfLogoMini" src="img/ToWorkFor - Logo.jpg" alt="ToWorkFor"></a></th>
  </tr>
<?php
   
    foreach($listaUserVer as $item){
        //if($item->getAtivo()){
?>

<section class = "lstUsers">
    <table class="userList">
        <tr><td><h3><?php echo $item->getEmail(); ?></h3></td>
                <td><h3><?php echo $item->getNome(); ?></h3></td>                
                <td><h3><?php echo $item->getTelefon(); ?></h3></td>
                <td><input type="submit" value="Editar"></td>
                
        </tr>
    </table>
</section>
<?php
       // }
    }
?>
