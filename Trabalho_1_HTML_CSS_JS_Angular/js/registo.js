function validarPass(){
    let password= registoUtilizador.password.value;
    let repeatpassword=registoUtilizador.repeatpassword.value;
    if (password==""|| password.length<8){
        alert ("A sua Password deve ter um mínimo de 8 carateres");
        registoUtilizador.password.focus();
        return false;
    }else if (password!==repeatpassword) {
        alert ("As Passwords não correspondem. Definina novamente a sua Password");
        registoUtilizador.password.focus();
        return false;
    }
}
