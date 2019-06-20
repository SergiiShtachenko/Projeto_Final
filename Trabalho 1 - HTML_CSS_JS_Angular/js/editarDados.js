function validarNewPass(){
    let NewPassword = editarUtilizador.NewPassword.value;
    let RepeatNewPassword = editarUtilizador.RepeatNewPassword.value;
    if (NewPassword==""|| NewPassword.length<8){
        alert ("A sua Password deve ter um mínimo de 8 carateres");
        editarUtilizador.NewPassword.focus();
        return false;
    }else if (NewPassword!==RepeatNewPassword) {
        alert ("As Passwords não correspondem. Definina novamente a sua Password");
        editarUtilizador.NewPassword.focus();
        return false;
    }
}
