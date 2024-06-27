function pesquisa() {
    const largura=window.innerWidth;
    if(largura<=900){
        pesquisamobile();
    }else{
        document.querySelector('#form-nav').classList.toggle('search-nav');
        
    }


}

function pesquisamobile() {
    document.querySelector('#form-nav').classList.toggle('search-nav');
    document.querySelector('.ul-nav').classList.toggle('ul-nav-ativo');
    const icones=document.querySelectorAll('.icone-nav');
    icones.forEach((icone)=>
        icone.classList.toggle('disable')
    );
}

