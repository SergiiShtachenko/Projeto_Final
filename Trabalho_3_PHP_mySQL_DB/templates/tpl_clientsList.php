<link rel="stylesheet" href="../css/clients.css">
    <script src="../js/clients.js"></script>
<!-------fim header------->
<?php  include ('../listaClientsVer.php'); ?>
<!-------lista_utilizadores.php------->
<section>
  <h1>Clientes</h1>
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


    <table class="clientList">
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
