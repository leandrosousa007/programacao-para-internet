// busca todas as imagens
const imagens = document.querySelectorAll("img");

// percorre cada imagem
for (let img of imagens) {
    
    // evento ao passar o mouse
    img.onmouseenter = function () {
        img.style.boxShadow = "0 0 20px red";
    };
    
    // evento ao tirar o mouse
    img.onmouseleave = function () {
        img.style.boxShadow = ""; 
    };
}