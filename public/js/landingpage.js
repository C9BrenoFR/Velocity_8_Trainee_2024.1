function abrirPost(form)
    {
        form.submit();
    }

function formata(texto){
        if(texto.length > 10)
            return texto.slice(0, 10) + '...';
        else
            return texto;
}

document.addEventListener("DOMContentLoaded", function(){

    const post = document.querySelector('.post');

    const postWidth = getComputedStyle(post).height;
    
    document.documentElement.style.setProperty('--height-img', postWidth);

    const nomeDeUsuario = document.querySelectorAll('.username');
    nomeDeUsuario.forEach(function(user){
        
        user.textContent = formata(user.textContent);
    });
});


