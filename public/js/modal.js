const filtro=document.getElementById('filtro');



function abrirmodal (idmodal){
    document.getElementById(idmodal).style.display= "block";
    filtro.style.display="block";
}



function fecharmodal (idmodal){
    document.getElementById(idmodal).style.display="none";
    filtro.style.display="none";
}