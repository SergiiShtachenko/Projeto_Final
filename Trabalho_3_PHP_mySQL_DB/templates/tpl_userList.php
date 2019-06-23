

        <section>
            <h1>Clientes</h1>
               <table id="clients">
                <tr>
                  <th><input type="text" id="Nome" onkeyup="procuraNome()" placeholder="Nome"></th>
                  <th><input type="text" id="NIF" onkeyup="procuraNIF()" placeholder="NIF"></th>
                  <th><input type="text" id="País" onkeyup="procuraPais()" placeholder="País"></th>
                  <th><input type="text" id="email" onkeyup="procuraEmail()" placeholder="Email (username)"></th>
                  <th><a href="https://www.toworkfor.pt"><img class="twfLogoMini" src="img/ToWorkFor - Logo.jpg" alt="ToWorkFor"></a></th>
                </tr>
<?php foreach($listaTotalUtilizadores as $item){?>
                <tr><td><?php echo $item->getEmail()?></td>
                <td><?php echo $item->getNome()?></td>
                <td><?php echo $item->getTelefon()?></td>
                <td><?php echo $item->getCliente()?></td>
                <td><input type="submit" value="Editar"></td>
            </tr>
                
              </table>

        </section>
<?php } ?>
