function valida() {

    if (form['usu'].value == "") {
        alert("O campo USUARIO e obrigatorio");
        form['usu'].focus();
        return false
    }

    if (form['senha'].value == "") {
        alert("O campo SENHA é obrigatório!");
        form['senha'].focus();
        return false
    }
}