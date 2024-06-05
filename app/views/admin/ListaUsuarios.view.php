<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/ListaUsuarios1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>V8</title>

</head>
<body>

    <div class="tela" id="tela"></div>

    <div class="container">
        <div class="card-title">
             <h1>Lista de Usuários</h1>
             
        </div>
        <div class="card-table">
            <table class="tabela">
                <thead>
                    <tr>
                        <td class="td1">Id</td>
                        <td class="td2" id="usuario2">Usuário</td>
                        <td class="td3">E-mail</td>
                        <td class="td4">Ações</td>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                    <tr>
                        <td class="td1"><?= $user->id; ?></td>
                        <td class="td2"><?= $user->pfp; ?> <?= $user->name; ?></td>
                        <td class="td3"><?= $user->email; ?></td>
                        <td class="td4">
                            <button type="button" class="btn btn-outline-light pc" onclick="abrirModalEditar('m_vis-<?= $user->id ?>')">Visualizar</button>
                            <button type="button" class="btn btn-outline-warning pc" onclick="abrirModalEditar('m_edit-<?= $user->id ?>')">Editar</button>
                            <button type="button" class="btn btn-outline-danger pc" onclick="abrirModalDelete('m_del-<?= $user->id ?>')">Deletar</button>
                            <button type="button" class="btn btn-outline-light mobile" onclick="abrirModalEditar('m_vis-<?= $user->id ?>')"><i class="fa-solid fa-eye"></i></button>
                            <button type="button" class="btn btn-outline-warning mobile" onclick="abrirModalEditar('m_edit-<?= $user->id ?>')"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="btn btn-outline-danger mobile" onclick="abrirModalDelete('m_del-<?= $user->id ?>')"><i class="fa-solid fa-trash"></i></button>
                        </td>    
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="pagination"   class="paginacao">
        <div class="control-prev"><i class="fa-solid fa-arrow-left"></i></div>
        <div class="page">1</div>
        <div class="page">2</div>
        <div class="page">3</div>
        <div class="page">4</div>
        <div class="control-next"><i class="fa-solid fa-arrow-right"></i></div>
    </div>

    <!--MODAL EDIÇÃO USUÁRIO-->
    <?php foreach($users as $user): ?>
    <div class="modal_edicao_content" id="m_edit-<?= $user->id ?>">
    <form class="modal_edicao" method="POST" action="/users/edit" enctype="multipart/form-data">
        <h1>Edição de Usuários</h1>

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?= $user->name; ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= $user->email; ?>">
        <label for="senha">Senha:</label>
        <input type="password" name="senha">
        <label for="img" class="form-label">Imagem: </label>
        <input type="file" name="img" required><br>

        <input type="text" name="id" value="<?= $user->id ?>" hidden>
        <input type="text" name="pfp_antigo" value="<?= $user->pfp ?>" hidden>

        <div class="botoes_edicao">
            <button>Salvar</button>
            <button onclick="fecharModalEditar('m_edit-<?= $user->id ?>')">Cancelar</button>
        </div>
    </form>
    </div>
    
    <!--MODAL VISUALIZAÇÃO DE USUÁRIO-->
    <div class="modal_vis" id="m_vis-<?= $user->id ?>">
        <div class="modal_vis_titulo">
            <h1>Visualizar Usuário</h1>
        </div>
        <h2>Nome:</h2>
        <p><?= $user->name; ?></p>
        <h2>Email:</h2>
        <p><?= $user->email; ?></p>
        <h2>Foto de perfil:</h2>
        <p class="pfp-modal"><?= $user->pfp ?></p>
        <div class="botao-close">
            <button onclick="fecharModalEditar('m_vis-<?= $user->id ?>')">Cancelar</button>
        </div>
    </div>


    <!--MODAL DELETAR USUÁRIO-->
    <div class="modal_delete" id="m_del-<?= $user->id ?>">
        <h1>Deseja deletar o usuário?</h1>
        <br>
        <h3>Atenção, uma vez que essa ação for concluida, não é possivel desfazê-la!<br>
            Tem certeza que deseja deletar esse usuário?</h3>
        
        <div class="botoes_deletar">
            <button onclick="fecharModalDelete('m_del-<?= $user->id ?>')">Cancelar</button>
            <button>Deletar</button>
            
        </div>
    </div>
    <?php endforeach; ?>

    <script src="/public/js/ListaUsuarios1.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
