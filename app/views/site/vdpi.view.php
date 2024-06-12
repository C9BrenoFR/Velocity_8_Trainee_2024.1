<?php


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <link rel="stylesheet" href="../../../public/css/vdpi.css">
    <link rel="shortcut icon" href="../../../public/assets/imagens/V8_SF_RC.ico" type="image/x-icon">
</head>
<body>
<?php foreach($posts as $post): ?>
    <div id="container">
        <div id="fundo"></div>
        <div id="perfil">
             
            <img src="../../../public/assets/Image.svg" alt="">
            <p class="name">
                
                <?php foreach($users as $user): 
                    if($user->id == $post->idUser)
                       echo $user->name;
                endforeach; ?>
            </p>
            <p class="data_hora"><?= $post->data ?></p>
            
            
        </div>

        <div id="postagem">
        
            <p class="titulo"><?= $post->title  ?></p>
            <div class="post">
                <img src="https://images-ext-1.discordapp.net/external/n7bOWsq0RLsswJWW3lezlBg0ToTHYLiFmHdBx5bZEeI/%3Fcrop%3D0.442xw%3A0.260xh%3B0.490xw%2C0.471xh%26resize%3D980%3A%2A/https/hips.hearstapps.com/hmg-prod/images/2024-mazda-mx-5-miata-rear-three-quarters-gray-65b3c9d00d96d.jpg?format=webp&width=1080&height=662" alt="">
                
                <p class="descricao">
                    <?= $post->description ?>
                </p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</body>
</html>