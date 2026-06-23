// busca todos os subtitulos h2
const subtitulos = document.querySelectorAll("h2");

// percorre cada subtitulo
for (let titulo of subtitulos) {
    
    // evento de clique simples para esconder
    titulo.onclick = function () {
        // adiciona a classe css ao elemento seguinte (a div de conteudo)
        this.nextElementSibling.classList.add("oculto");
    };

    // evento de clique duplo para mostrar
    titulo.ondblclick = function () {
        // remove a classe css do elemento seguinte
        this.nextElementSibling.classList.remove("oculto");
    };
}