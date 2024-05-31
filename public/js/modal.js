const filtro=document.getElementById('filtro');


function abrirmodal (idmodal){
    document.getElementById(idmodal).style.display= "block";
    filtro.style.display="block";
}


function fecharmodal (idmodal){
    document.getElementById(idmodal).style.display="none";
    filtro.style.display="none";
}

function openModal (idModal){
    document.getElementById(idModal).style.display = "flex";
    filtro.style.display="flex";
}

function closeModal (idModal){
    document.getElementById(idModal).style.display = "none";
    filtro.style.display="none";
}

function getData(){
    const dia = String(data.getDate()).padStart(2, '0');

    const mes = String(data.getMonth() + 1).padStart(2, '0');

    const ano = data.getFullYear();

    const dataAtual = `${dia}/${mes}/${ano}`;

    return dataAtual;
}
