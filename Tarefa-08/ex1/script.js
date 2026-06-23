// busca elementos no dom
const campoInteresse = document.querySelector("#campoInteresse");
const botaoAdicionar = document.querySelector("#btnAdicionar");
const listaInteresses = document.querySelector("#listaInteresses");

// evento de clique no botao
botaoAdicionar.addEventListener("click", function () {
    
    // pega valor e remove espacos
    const valorDigitado = campoInteresse.value.trim();

    // verifica se nao esta vazio
    if (valorDigitado !== "") {
        
        // cria elementos da lista
        const novoLi = document.createElement("li");
        const novoSpan = document.createElement("span");
        const novoBotao = document.createElement("button");
        
        // configura o texto
        novoSpan.textContent = valorDigitado;
        novoSpan.className = 'item-texto'; 
        
        // configura o botao de remover
        novoBotao.textContent = 'x';
        novoBotao.className = 'btn-remover'; 
        
        // monta o item
        novoLi.appendChild(novoSpan);
        novoLi.appendChild(novoBotao);
        
        // adiciona na tela
        listaInteresses.appendChild(novoLi);
        
        // evento para remover item
        novoBotao.onclick = function () {
            listaInteresses.removeChild(novoLi);
        };
        
        // limpa o campo
        campoInteresse.value = '';
        campoInteresse.focus();
    }
});