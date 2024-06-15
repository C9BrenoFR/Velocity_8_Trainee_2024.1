<?php
    if(isset($_FILES['image'])){
        $arq = $_FILES['image'];
        
        if($arq['error'])
            die("Falha ao enviar o arquivo");
        
        $pasta = "img/";
        $name_arq = $arq['name'];
        $newName_arq = uniqid();
        $extensao = strtolower(pathinfo($newName_arq, PATHINFO_EXTENSION));

        if($extensao != "jpg" && $extensao != "png")
            die("Tipo de arquivo não aceito.");

        $path = $pasta . $newName_arq . "." . $extensao;
        $certo = move_uploaded_file($arq["tmp_name"], $path );
        
        if($certo){
            $mysqli ->query("INSERT INTO  post(id, data, description, image, title, post, idUser) VALUES('$name_arq', '$path')") or die($mysqli->error);
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../public/css/listadepost_adm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../../public/css/modal.css">
    <link rel="shortcut icon" href="../../../public/assets/imagens/V8_SF_RC.ico" type="image/x-icon">
    <title>V8 - Lista de Post</title>
</head>
<body>
    <?php require('sideBar.html')
    ?>
        <div class="filtro" id="filtro"></div>
    <div class="container">
        <div class="card-title">
             <h1>Lista de Posts</h1>
             <button type="button" class="btn btn-outline-info pc" onclick="abrirmodal('criar')" >Criar</button>
             <button type="button" class="btn btn-outline-info mobile">+</button>
        </div>
        <?php $idPost = 1; ?>
        <div class="card-table">
            <table class="tabela">
                <thead>
                    <tr>
                        <td class="td1">Id</td>
                        <td class="td2">Posts</td>
                        <td class="td3">Ações</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($posts as $post): ?>
                    <tr>
                        <td class="td1"> <?= $idPost ?> </td>
                        <td class="td2"> <?= $post->title ?> </td>
                        <td class="td3">
                            <button type="button" class="btn btn-outline-light pc" onclick="openModal('visualizar-<?= $post->id ?>')">Visualizar</button>
                            <button type="button" class="btn btn-outline-warning pc" onclick="abrirmodal('editar-<?= $post->id ?>')">Editar</button>
                            <button type="button" class="btn btn-outline-danger pc" onclick="abrirmodal('deletar-<?= $post->id ?>')">Deletar</button>
                            <button type="button" class="btn btn-outline-light mobile"onclick="abrirmodal('visualizar')" ><i class="fa-solid fa-eye"></i></button>
                            <button type="button" class="btn btn-outline-warning mobile" onclick="abrirmodal('editar')"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="btn btn-outline-danger mobile" onclick="abrirmodal('deletar')"><i class="fa-solid fa-trash"></i></button>
                        </td>
                 
                    </tr>
                    <?php $idPost++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!--PAGINAÇÃO-->
    <div id="pagination"   class="paginacao">
        
        <li class="page-item  <?= $page <= 1 ? "disabled": "" ?>">
            <a class="control-prev" href="?paginacaoNumero=<?= $page-1 ?>"><i class="fa-solid fa-arrow-left"></i></a>
        </li>

        <?php for($page_number = 1; $page_number <= $total_pages; $page_number++): ?>
            <li class="page"><a class="page <?= $page_number == $page ? "active" : "" ?>" href="?paginacaoNumero=<?= $page_number ?>"><?= $page_number ?></a></li>
        <?php endfor ?>

        <li class="page-item  <?= $page >= $total_pages ? "disabled": "" ?>">
            <a class="control-next" href="?paginacaoNumero=<?= $page+1 ?>"><i class="fa-solid fa-arrow-right"></i></a>
        </li>
        
    </div>

    <!-- Modal de Criação -->
    
    <div class="tamanho" id="criar">
        <div class="fundo">
            <form class="caixa" method="POST" action="/listadepost/create" enctype="multipart/form-data">   
                        <fieldset>
                            <legend>Criação de Post</legend>

                            <div class="row g-3">
                                <div class="col-sm-7">
                                    <label for="autor" class="form-label">Autor: </label><br>
                                    <select name="autor" class="form-select" id="1" required>
                                        <option value="">Selecione um Autor: </option>
                                        <?php foreach($users as $user): ?>
                                            <option value="<?php echo $user->id ?>"><?php echo $user->name ?></option>
                                            <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-sm">
                                    <label for="data" class="form-label">Data: </label>
                                    <input type="date" class="form-control" id="data" name="data" required>
                                </div>
                            </div>
                        
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título: </label>
                                <input type="text" class="form-control" id="titulo" name="title" size="100" placeholder="Insira o título" required>
                                
                                <label for="descr" class="form-label">Descrição: </label>

                                <div id="descr">
                                    <textarea class="form-control" rows="6" name="description" required placeholder="Insira a descrição"></textarea>
                                </div>

                                <label for="img" class="form-label">Imagem: </label>
                                <input class="form-control" type="file" id="img" name="image" required><br>
                            </div>
                            <div id="botao">
                                <button type="submit" class="btn btn-primary">Criar</button>
                                <button type="reset" class="btn btn-primary" onclick="fecharmodal('criar')">Cancelar</button>
                            </div>
                        </fieldset>
                </form>
        </div>
    </div>

    <!-- Modal de Deletar -->

    <?php foreach( $posts as $post ): ?>
    <div class="tamanho" id="deletar-<?= $post->id ?>">
        <div class="fundo">
            <form class="caixa" method="POST" action="listadepost/delete">   
                        <fieldset>
                            <legend>Deletar Post</legend>
                            <p> Atenção, uma vez que essa ação for concluida, não é possivel desfazê-la! <br> Tem certeza que deseja deletar esse Post? </p>
                           
                            <div id="botao">
                                <input type="hidden" value="<?= $post->id ?>" name="id">
                                <button type="submit" class="btn btn-primary">Deletar</button>
                                <button type="reset" class="btn btn-primary" onclick="fecharmodal('deletar-<?= $post->id ?>')">Cancelar</button>
                            </div>
                        </fieldset>
                </form>
        </div>
    </div>

    <!-- Modal de Editar -->

    <div class="tela" id="tela"></div>
        <div class="tamanho" id="editar-<?= $post->id ?>">
            <div class="fundo">
                <form class="caixa" method="post" action="/listadepost/edit" enctype="multipart/form-data">   
                        <fieldset>
                            <legend>Editar Post</legend>

                            <div class="row g-3">
                                <div class="col-sm-7">
                                    <label for="autor" class="form-label">Autor: </label><br>
                                    <select name="autor" class="form-select" id="1" required>
                                        <option value=""> Selecione o Autor:</option>
                                        <?php foreach($users as $user): ?>
                                            <option value="<?php echo $user->id ?>" <?= $user->id == $post->idUser ? 'selected' : ' ' ?> ><?php echo $user->name ?></option>
                                            <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-sm">
                                    <label for="data" class="form-label">Data: </label>
                                    <input type="date" value="<?php echo $post->data ?>" class="form-control" id="data" name="data" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título: </label>
                                <input type="text" class="form-control" id="titulo" name="title" value="<?= $post->title ?>" size="100" required>
                                
                                <label for="descr" class="form-label">Descrição: </label> 

                                <div id="descr">
                                    <textarea class="form-control" rows="6" name='description' required><?= $post->description ?>  </textarea>
                                </div>

                                <label for="img" class="form-label">Imagem: </label>
                                <input class="form-control" type="file" id="img" name="image"><br>
                                <input type="text" hidden value="<?= $post->image ?>" name="imgAntiga">
                                
                            </div>
                            <div id="botao">
                                <input type="hidden" value="<?= $post->id ?>" name="id">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <button type="reset" class="btn btn-primary" onclick="fecharmodal('editar-<?= $post->id ?>')">Cancelar</button>
                            </div>
                        </fieldset>
                </form>
        </div>
    </div>



    <!-- Modal de Visualização -->

    <div class="tamanho" id="visualizar-<?= $post->id ?>" class="alterar">
            <form class="caixa" id="viz" method="post" action="#">   
                    <fieldset>
                        <legend>Visualizar Post</legend>

                        <div class="row g-3" id="aut">
                            <div class="col-sm-7">
                                <label for="autor" class="form-label">Autor: </label>
                                <p class="form-control" id="autor">
                                    
                                <?php 
                                
                                foreach( $users as $user ) {
                                    if( $user->id == $post->idUser ) {
                                        echo $user->name;
                                    }
                                }
                                
                                ?>
                            
                            </p>
                            </div>
                            <div class="col-sm">
                                <label for="data" class="form-label">Data: </label>
                                <input type="date" value="<?php echo $post->data ?>" class="form-control" id="data" name="data" readonly>
                                
                            </div>
                        </div>
                       
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título: </label>
                            <p class="form-control" id="titulo"><?= $post->title ?></p>

                            <label for="descr" class="form-label">Descrição: </label>

                            <div id="descr">
                                <textarea disabled class="form-control" rows="6" required><?= $post->description?></textarea>
                            </div>

                            <label for="img" class="form-label"> Imagem: </label>
                            <img src="<?= $post->image ?>" alt="imagem do post">
                        

                            <div id="botao"> 
                                <button type="reset" class="btn btn-primary" onclick="closeModal('visualizar-<?= $post->id ?>')">Fechar</button>
                            </div>   
                            
                    </fieldset>
            
            </form>
        </div>
    </div>
    <?php endforeach; ?>
                       
</body>
<script src="../../../public/js/modal.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>