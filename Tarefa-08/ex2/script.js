// busca elementos no dom
const campoEstado = document.querySelector("#campoEstado");
const mensagemSaida = document.querySelector("#mensagemSaida");

// evento de mudanca no select
campoEstado.onchange = function () {
    
    // pega o valor do estado
    const valor = campoEstado.value;
    
    // atualiza o texto na tela
    if (valor !== "") {
        mensagemSaida.textContent = 'Você selecionou: ' + valor;
    } else {
        mensagemSaida.textContent = 'Você selecionou: ';
    }
};