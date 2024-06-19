let menuItem = document.querySelectorAll('.item-menu');

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
let btnExp = document.querySelector('.btn-expandir')
let side = document.querySelector('.sidebar')
let ul = document.querySelector('.ul-sidebar')

btnExp.addEventListener('click', function(){
    side.classList.toggle('expandir'); 
    side.classList.toggle('sidebar-mobile'); 
    btnExp.classList.toggle('btn-expandir-mobile');
    ul.classList.toggle('ul-sidebar-mobile');  
})

//Seleção do ícone------------------------
//executa quando a pag eh carregada
document.addEventListener('DOMContentLoaded', function(){
    const caminho = window.location.href;
    let links = document.querySelectorAll('a');
    links.forEach(function(link){
        if(link.href === caminho){
            let li = link.closest('li');
            li.classList.add('ativo');
            return;
        }
    })
}); 
