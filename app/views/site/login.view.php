<?php 
session_start();
if (isset($_SESSION['logado'])){
    return redirect('dashboard');

}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="../../../public/css/login.css">
<title>V8 - Login</title>

</head>
<body>
<section class="area-global">
    <selection class="area-foto">
        <div class="foto">
        
        </div> 
        <div>
            <img class="imagem" src="../../../public/assets/imagens/fundobranco.png">
        </div>
            
        
    </selection>
        
    
   <selection class="area-login">
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="/users/create" method="POST">
                <h1>Criar conta</h1>
                
                <label>
                    <input name="nome" type="text" placeholder="Nome"/>
                </label>
                <label>
                    <input name="email" type="email" placeholder="Email"/>
                </label>
                <label>
                    <input name="senha" id="senhaCriar"type="password" placeholder="Senha"/>
                </label>
                <i class="bi bi-eye-fill eye" id="btn-senha" onclick="mostrarSenha('senhaCriar')"></i>
                <button style="margin-top: 9px">Criar</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="login" method="post">
                <h1>Entrar</h1>
                <label>
                    <input type="email" placeholder="Email" name="email"/>
                </label>
                <label class="senha">
                    <input id="senhaEntrar" type="password" placeholder="Senha" name="password"/>

                </label>
                <i class="bi bi-eye-fill eye" id="btn-senha" onclick="mostrarSenha('senhaEntrar')"></i>
                <div class="error">
                    <p style="color: red">
                 <?php if(isset($error)){
                    echo $error['error'];
                 } ?>
                    </p>
                </div>
                <button>Entrar</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Entrar</h1>
                    <p class="overlay-text">Clique aqui se ja tem uma conta.</p>
                    <button class="ghost mt-5" id="signIn">Entrar</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Criar conta!</h1>
                    <p class="overlay-text">Crie uma conta aqui, se você não tem uma conta </p>
                    <button class="ghost" id="signUp">Criar</button>
                </div>
            </div>
        </div>
    </div>
    </selection>

</section>

<script src="/public/js/main.js"></script>
</body>

</html>