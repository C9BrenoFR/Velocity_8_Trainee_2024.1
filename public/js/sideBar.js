var menuItem = document.querySelectorAll('.item-menu');

//removendo a classe ativo do link que nao foi clicado e adicionando ao que foi
function selectLink(){
    menuItem.forEach((item)=>
        item.classList.remove('ativo')
    )
    this.classList.add('ativo')
}

//quando clicar, chamar a func
menuItem.forEach((item)=>
    item.addEventListener('click', selectLink)
)

//Expandir o menu -----------------------------------------
var btnExp = document.querySelector('#btn-exp')
var side = document.querySelector('.sidebar')

btnExp.addEventListener('click', function(){
    side.classList.toggle('expandir')
})