<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velocity 8</title>
    <link rel="stylesheet" href="/public/css/listaDePosts.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500;600;700&family=Khula:wght@400;600&display=swap" rel="stylesheet">


</head>
<body>

    <div class="search-box">
        <input type="text" class="search-txt" placeholder="Qual título você quer pesquisar?">
        <img src="/search.svg" alt="Lupa" class="search-bton" >
    </div>

    <div class="divona">

    <?php foreach($posts as $post): ?>
        <div class="posts">
            <img src="/By my car-amico (1).svg" alt="carro do post 1">
            <div class="usuario">
                <span> <img src="/usuario3.svg" alt="usuário 1"> </span>
                <h1>
                    <?php foreach($users as $user): 
                        if($user->id == $post->idUser)
                          echo $user->name;
                    
                    endforeach; ?>
                
                </h1>
            </div>
            <a href="vdpi?id=<?php echo $post->id ?>"><?= $post->title ?></a>
            <p class="desc">
               <?= $post->description ?>
            </p>
        </div>
        
    <?php endforeach; ?>
    </div>

    <div class="divinha">

        <div class="posts">
            <img src="/By my car-amico (1).svg" alt="carro do post 4">
            <div class="usuario">
                <span> <img src="/usuario2.svg" alt="usuário 4"> </span>
                <h1>Nome do Usuário</h1>
            </div>
            <p>Perfeição sobre rodas: BMW Série</p>
            <p class="desc">
                Descubra a emoção de dirigir a lendária BMW Série...
            </p>

        </div>

        </div>

    </div>

    
<!--   <div class="paginacao">
        <div class="maiormenor">
        <a href="#"><</a>
        </div>
        <div class="quadradinhos">
            <a href="#">1</a>
        </div>

        <div class="quadradinhos">
            <a href="#">2</a>
        </div>

        <div class="quadradinhos">
            <a href="#">3</a>
        </div>
        
        <div class="quadradinhos">
            <a href="#">4</a>
        </div>
        <div class="maiormenor">
            <a href="#">></a>
        </div>
        
    </div>
-->

</body>
</html>

