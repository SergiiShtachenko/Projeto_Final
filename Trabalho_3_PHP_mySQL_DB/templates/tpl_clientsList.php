
<style> 
    <?php echo file_get_contents("css/clients.css"); ?>
    <?php echo file_get_contents("css/header.css"); ?>
</style>
<script defer>
    <?php echo file_get_contents("js/clients.js"); ?>
</script>

<link rel="stylesheet" href="../css/clients.css">
<link rel="stylesheet" href="../css/header.css">
    <script src="../js/clients.js"></script>
<!-------fim header------->
<?php  //include ('../listaClientsVer.php'); ?>
<!-------lista_utilizadores.php------->
<section >
<br>
   <br> <br> <br> <br> 
  <h1>Clientes</h1>
  <a href="criarCliente.php"> Criara novo</a>
  <table id="clients">
  <tr>
  <th><input type="text" id="Nome" onkeyup="procuraNome()" placeholder="Nome"></th>
  <th><input type="text" id="Morada" onkeyup="procuraPais()" placeholder="Morada"></th>
  <th><input type="text" id="NIF" onkeyup="procuraNIF()" placeholder="NIF"></th> 
  <th><input type="text" id="Telefone" onkeyup="procuraNIF()" placeholder="Telefone"></th>
  <th><input type="submit" value="Pesquisar"></th>            
  
  </tr>
<?php
   
    foreach($listaClientsVer as $item){
        //if($item->getAtivo()){
?>


    <table id="tabSerch" class="clientList">
        <tr><td><h3><?php echo $item->getNomeCliente(); ?></h3></td>
                <td><?php echo $item->getNif(); ?></td>
                <td><?php echo $item->getMorada(); ?></td>                      
                <td><?php echo $item->getTelefon(); ?></td>
                <td><input type="submit" value="Editar"></td>
                
        </tr>
    </table>
</section>
<?php
       // }
    }
?>
