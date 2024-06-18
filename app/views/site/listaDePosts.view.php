<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V8 - Lista de Posts</title>
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
    <link rel="shortcut icon" href="../../../public/assets/imagens/V8_SF_RC.ico" type="image/x-icon">

</head>

<body>
    <?php
    require('navbar.html');
    ?>
    <div class="page">
        <div class="search-container">
            <form class="search-box" action="/posts/search" method="get">
                <input name="busca" type="text" class="search-txt" autocomplete="off" placeholder="Qual título você quer pesquisar?" id="pesquisar">
                <button class="search-bton">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg>
                </button>

            </form>
        </div>
        <div class="divona">

            <?php foreach ($posts as $post) : ?>
                <form class="posts" action="/vdpi" method="get" onclick="abrirPost(this)">
                    <img src="<?= $post->image ?>" alt="carro do post 1">
                    <div class="usuario">
                        <?php foreach ($users as $user) :
                            if ($user->id == $post->idUser) : ?>
                                <span> <img src="<?= $user->pfp ?>" alt="usuário"> </span>
                                <h1>
                                    <?= $user->name ?>
                                </h1>
                        <?php endif;
                        endforeach; ?>
                    </div>
                    <p class="titulo-post"> <?= substr($post->title, 0, 30) . '...' ?> </p>
                    <p class="desc">
                        <?= substr($post->description, 0, 59) . '...' ?>
                    </p>
                    <input hidden name="id" value="<?= $post->id ?>">
                </form>

            <?php endforeach; ?>


            <?php if (empty($posts)) : ?>
                <div class="posts">
                    <img src="/public/assets/not-found.png" alt="imagem de post não encontrado">
                    <div class="usuario">
                        <h1>
                            Nenhum post encontrado. Tente outro título
                        </h1>
                    </div>
                </div>
            <?php endif ?>

        </div>

        <!--PAGINAÇÃO-->
        <div id="pagination" class="paginacao">

            <li class="page-item  <?= $page <= 1 ? "disabled" : "" ?>">
                <a class="control-prev" href="?paginacaoNumero=<?= $page - 1 ?>"><i class="fa-solid fa-arrow-left"></i></a>
            </li>

            <?php for ($page_number = 1; $page_number <= $total_pages; $page_number++) : ?>
                <li class="page"><a class="page <?= $page_number == $page ? "active" : "" ?>" href="?paginacaoNumero=<?= $page_number ?>"><?= $page_number ?></a></li>
            <?php endfor ?>

            <li class="page-item  <?= $page >= $total_pages ? "disabled" : "" ?>">
                <a class="control-next" href="?paginacaoNumero=<?= $page + 1 ?>"><i class="fa-solid fa-arrow-right"></i></a>
            </li>

        </div>



    </div>
    <?php
    require('footer.html');
    ?>
</body>
<script>
    function abrirPost(form) {
        form.submit();
    }
</script>

</html>