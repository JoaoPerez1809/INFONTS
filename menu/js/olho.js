function mostrarOcultarSenha() {
    var senha=document.getElementById("senha");
    if(senha.type=="password"){
        senha.type="text";
        toggle.classList.add('hide')
    }else{
        senha.type="password"
        toggle.classList.remove('hide')
    }
}
