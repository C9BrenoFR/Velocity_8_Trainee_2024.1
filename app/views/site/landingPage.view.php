<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V8 - Landing Page</title>

    <link rel="stylesheet" href="/public/css/landingPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container1">
        <h1> FIQUE POR DENTRO DO MELHOR DO MUNDO DOS CARROS. </h1>
        <h2> Você está a um clique de distância do que há de melhor. </h2>
        <a href="/posts">Saiba Mais</a>
    </div>

    <div class="container2">

        <?php foreach($posts as $post): ?>
        <div class="post">
            <div class="descricao">
            <?= substr($post->description , 0 , 59).'...' ?>
            </div>

            <div class="imagemCar">
                <img src="<?= $post->image ?>" alt="carro do post 2">
            </div>
            
            <div class="usuario">
                <div class="esp">
                    <img src="<?php foreach($users as $user): 
                        if($user->id == $post->idUser)
                        echo $user->pfp;
                        endforeach; ?>" alt="usuário 1">
                    <h1><?php foreach($users as $user):
                    if($user->id == $post->idUser)
                        echo $user->name;
                    
                    endforeach; ?></h1>
                </div>
                <p> <?= $post->title ?> </p>
            </div>
            
        </div>

        <?php endforeach; ?>

        </div>
    </div>

</body>
</html>