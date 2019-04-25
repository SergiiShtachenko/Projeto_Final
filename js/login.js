// Timeout enquanto 3 vezes errar password
let timeset = 0;
let tentativas = 3;

function contarTempo() {
  let timer = setInterval(function() {
      timeset -= 1000;
  }, 1000); // decrementar 1 segundo
  setTimeout(function() {
    clearInterval(timer);
    timeset = 0;
    tentativas = 3;
  }, 10000); // parar timer
}

function validarCredenciais(){
    // Ligação com a forma "userAccess"
    let form = document.getElementsByTagName('form')[0];

    // Função temporaria - validar credenciais sem php
    form.addEventListener('submit', function(event){
        
        let outMessage = document.getElementsByTagName('p')[0];

        if (timeset === 0) {

            let login = document.querySelector('form input[name=user]').value;
            let password = document.querySelector('form input[name=password]').value;        
                    
            let logCorretoArrey = new Array("teste", "admin", "user");
            let passCorretoArrey = new Array("teste", "admin", "user");
            
            let index = logCorretoArrey.indexOf(login);
            //alert(index);
            
            if(index < 0){
                outMessage.innerHTML = "Introduziu o login errado";
                document.querySelector('form input[name=user]').value = "";
                document.querySelector('form input[name=password]').value = "";
            } 
            
            else{
                if (password === passCorretoArrey[index]) {
                    
                    // Função temporaria - atribuir o nome do utilizador
                    let nome = document.getElementById("userName");    
                    nome.innerHTML = document.querySelector('form input[name=user]').value;

                    window.location.href = "#order";                                                          
                }
                else{
                    if(tentativas > 1){ // 3 tentativas de inserir palavra passe
                        outMessage.innerHTML = "Passe errada! Tente novamente!";
                        document.getElementById("criarConta").innerHTML = "Clique <a href='#registo'>aqui</a> para recuperar senha";
                        tentativas--;
                    }
                    else{
                        outMessage.innerHTML = "Tente novamente mais tarde!"
                        timeset = 10000; // Esperar 10 segundos
                        contarTempo();
                    }
                    document.querySelector('form input[name=password]').value = "";
                }            
            }

        } else outMessage.innerHTML = "Excedeu limite das tentativas, tente novamente em " + (timeset / 1000) + " segundos";
        
        event.preventDefault();
    });
}

