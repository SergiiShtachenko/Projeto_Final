
<style>
    <?php echo file_get_contents("css/header.css"); ?>
    <?php echo file_get_contents("css/clients.css"); ?>
    <?php echo file_get_contents("css/editarDados.css"); ?>
</style>
<script defer>
    <?php echo file_get_contents("js/clients.js"); ?>
</script>

<link rel="stylesheet" href="../css/clients.css">
<link rel="stylesheet" href="../css/header.css">

    
<!-------fim header------->
<?php  //include ('../listaUsersVer.php'); ?>
<!-------lista_utilizadores.php------->
<section style="margin-top: 60px;">
   <br>
   <br> 
  <h1>Utilizadores  </h1>
  <a href="criarUses.php"> Criara novo</a>
  <table id="clients">
  <tr>
  <th><input type="text" id="Morada" placeholder="Email"></th>
  <th><input type="text" id="Nome" placeholder="Nome"></th>
  <th><input type="text" id="Telefone" placeholder="Telefone"></th>
  <th><input type="submit" value="Pesquisar"></th>            
  </tr>
<?php
   
    foreach($listaUserVer as $item){
        //if($item->getAtivo()){
?>


    <table id="tabSerch" class="clientList">
        <tr><td><h3><?php echo $item->getEmail(); ?></h3></td>
                <td><h3><?php echo $item->getNome(); ?></h3></td>                
                <td><h3><?php echo $item->getTelefon(); ?></h3></td>
                <td><input type="submit" value="Editar"></td>
                
        </tr>
    </table>

<?php
       // }
    }
?>
