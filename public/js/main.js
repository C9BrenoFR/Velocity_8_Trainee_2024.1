/*let olho = document.getElementsByClassName("eye"){

}*/
function mostrarSenha(senha){

var inputPass = document.getElementById(senha)
var btnShowPass = document.getElementById('btn-senha')

if(inputPass.type === 'password'){
    inputPass.setAttribute('type','text')
    btnShowPass.classList.replace('bi-eye-fill', 'bi-eye-slash-fill')

} else{
    inputPass.setAttribute('type','password')
    btnShowPass.classList.replace('bi-eye-slash-fill', 'bi-eye-fill')

}





}
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () =>
    container.classList.add('right-panel-active'));

signInButton.addEventListener('click', () =>
    container.classList.remove('right-panel-active'));



