<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Nova Postagem</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="dash.css">
</head>
<body>

<div class="dashboard-container">
    <?php include 'menu.php'; ?>

    <main class="content">
        <div class="header-content">
            <h2><i class="fa-solid fa-file-pen"></i> Nova Postagem</h2>
            <p>Escreva o título e o conteúdo da sua nova publicação.</p>
        </div>

        <section class="card-form">
            <form action="processar-cad-post.php" method="POST">
                <div class="form-group">
                    <label for="titulo">Título da Postagem</label>
                    <input type="text" id="titulo" name="titulo" placeholder="Digite um título chamativo..." required>
                </div>

                <div class="form-group">
                    <label for="conteudo">Conteúdo</label>
                    <textarea id="conteudo" name="conteudo" placeholder="Escreva o texto aqui..." style="width: 100%; min-height: 200px; padding: 15px; border-radius: 8px; border: 1px solid #ccc; font-family: sans-serif;"></textarea>
                </div>

                <div class="form-row" style="display: flex; gap: 15px;">
                    <div class="form-group" style="flex: 1;">
                        <label for="status">Status</label>
                        <select id="status" name="status">
                            <option value="Ativo">Publicar Agora</option>
                            <option value="Inativo">Salvar como Rascunho</option>
                        </select>
                    </div>
                </div>

                <div class="form-actions" style="margin-top: 20px;">
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-check"></i> Salvar Postagem
                    </button>
                    <a href="postagens.php" class="btn-cancel">
                        <i class="fa-solid fa-xmark"></i> Cancelar
                    </a>
                </div>
            </form>
        </section>
    </main>
</div>

</body>
</html>