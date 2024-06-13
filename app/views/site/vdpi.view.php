<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V8 - Visualização de Post Individual</title>
    <link rel="stylesheet" href="../../../public/css/vdpi.css">
</head>
<body>

    <div id="container">
        <div id="fundo"></div>
        <div id="perfil">
            <img src="<?= $user[0]->pfp ?>" alt="">
            <p class="name"><?= $user[0]->name ?></p>
            <p class="data_hora"><?= $post[0]->data ?></p>
        </div>

        <div id="postagem">
            <p class="titulo"><?= $post[0]->title ?></p>
            <div class="post">
                <img src="<?= $post[0]->image ?>" alt="">
                
                <p class="descricao">
                <?= $post[0]->description ?>
                </p>
            </div>
        </div>
    </div>
</body>
</html>