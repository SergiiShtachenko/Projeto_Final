



// Função temporaria - atribuir o nome do utilizador
let form = document.getElementsByTagName('form')[0];

form.addEventListener('submit', function(event){

    let nome = document.getElementById("userName");    
    nome.innerHTML = document.querySelector('form input[name=user]').value;

    event.preventDefault();
});