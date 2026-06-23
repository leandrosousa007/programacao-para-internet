// registra a funcao no evento de envio do formulario
document.forms.cadastro.onsubmit = validaForm;

function validaForm(e) {
    // captura o formulario
    let form = e.target;
    let formValido = true;

    // captura os spans para exibir os erros
    const spanUsuario = form.usuario.nextElementSibling;
    const spanSenha = form.senha.nextElementSibling;
    const spanEmail = form.email.nextElementSibling;

    // limpa as mensagens de erro antes de verificar
    spanUsuario.textContent = "";
    spanSenha.textContent = "";
    spanEmail.textContent = "";

    // verifica o campo usuario
    if (form.usuario.value.trim() === "") {
        spanUsuario.textContent = 'O usuário deve ser preenchido';
        formValido = false;
    }

    // verifica o campo senha
    if (form.senha.value.trim() === "") {
        spanSenha.textContent = 'A senha deve ser preenchida';
        formValido = false;
    }

    // verifica o campo email
    if (form.email.value.trim() === "") {
        spanEmail.textContent = 'O email deve ser preenchido';
        formValido = false;
    }

    // cancela o envio se algum campo estiver invalido
    if (!formValido) {
        e.preventDefault();
    }
}