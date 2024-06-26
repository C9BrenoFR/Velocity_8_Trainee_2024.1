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
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500;600;700&family=Khula:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../../../public/css/login.css">
<link rel="shortcut icon" href="../../../public/assets/imagens/V8_SF_RC.ico" type="image/x-icon">
<title>V8 - Login</title>

</head>
<body>
<section class="area-global">
    <selection class="area-foto">
        <div class="foto">
        
        </div> 
        <div>
            <a href="/">
            <img class="imagem" src="../../../public/assets/imagens/fundobranco.png">
            </a>
        </div>
            
        
    </selection>
        
    
   <selection class="area-login">
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="/users/create" method="POST">
                <h1>Criar conta</h1>
                
                <div>
                    <input class="input" name="nome" type="text" placeholder="Nome"/>
                </div>
                <label>
                    <input class="input" name="email" type="email" placeholder="Email"/>
                </label>
                <label>
                    <div class="input">
                    <input class="input-senha" name="senha" id="senhaCriar"type="password" placeholder="Senha"/>
                    <i class="bi bi-eye-fill eye" id="btn-senha" onclick="mostrarSenha('senhaCriar')"></i>
                    </div>
                </label>
                <button style="margin-top: 9px">Criar</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="login" method="post">
                <h1>Entrar</h1>
                <label>
                    <input class="input" type="email" placeholder="Email" name="email"/>
                </label>
                <label class="senha">
                    <div class="input">

                   
                        <input class="input-senha" id="senhaEntrar" type="password" placeholder="Senha" name="password"/>
                        <i class="bi bi-eye-fill eye" id="btn-senha2" onclick="mostrarSenha2('senhaEntrar')"></i>
                    </div>

                </label>
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