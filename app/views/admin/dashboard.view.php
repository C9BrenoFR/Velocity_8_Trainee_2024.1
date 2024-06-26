<?php 
session_start();
if (!$_SESSION['logado']){
    return redirect('login');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/dashboard.css">
    <link rel="shortcut icon" href="../../../public/assets/imagens/V8_SF_RC.ico" type="image/x-icon">

    <title>V8 - Dashboard</title>
</head>
<body>
    
    <div class="waveWrapper waveAnimation">
        <div class="waveWrapperInner bgTop">
          <div class="wave waveTop" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-top.png')"></div>
        </div>
        <div class="waveWrapperInner bgMiddle">
          <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')"></div>
        </div>
        <div class="waveWrapperInner bgBottom">
          <div class="wave waveBottom" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png')"></div>
        </div>
      </div>

      
    <div class="divonica">
        <div class="icones">
            <a href="/" class="img">
                <img src="/public/assets/house-chimney-solid (1).svg" alt="imagem da página home" class="icone">
                <div class="p">Home</div>
            </a>
        
            <a href="/listadepost" class="img">
                <img src="/public/assets/envelope-solid.svg" alt="imagem da página dos posts" class="icone">
                <div class="p">Posts</div>
            </a>
        
            <a href="/users" class="img">
                <img src="/public/assets/user-solid.svg" alt="imagem da página dos usuários" class="icone">
                <div class="p">Usuário</div>
            </a>
       
            <a href="/logout" class="img">
                <img src="/public/assets/arrow-right-from-bracket-solid.svg" alt="imagem da página de logout" class="icone">
                <div class="p">Logout</div>
            </a>

        </div>
    </div>
</body>
</html>