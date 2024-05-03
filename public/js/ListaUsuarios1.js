const tela = document.querySelector('#tela')

function abrirModalEditar(idModal){
    document.getElementById(idModal).style.display = "flex"
    tela.style.display = "block"
}

function fecharModalEditar(idModal){
    document.getElementById(idModal).style.display = "none"
    tela.style.display = "none"
}