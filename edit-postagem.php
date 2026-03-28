<?php
// 1. Conexão com o banco
include 'conexao.php';

// 2. Verifica se o ID foi passado na URL
if (!isset($_GET['id'])) {
    header("Location: postagens.php"); // Se não tiver ID, volta pra lista
    exit();
}

$id = intval($_GET['id']); // Garante que o ID seja um número

// 3. Busca os dados atuais da postagem
$sql = "SELECT * FROM postagens WHERE id = $id";
$resultado = $conn->query($sql);

// Se não encontrar a postagem, volta para a lista
if ($resultado->num_rows == 0) {
    header("Location: postagens.php");
    exit();
}

$post = $resultado->fetch_assoc(); // Dados da postagem
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Postagem</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="dash.css">
</head>
<body>

<div class="dashboard-container">
    <?php include 'menu.php'; ?>

    <main class="content">
        <div class="header-content">
            <h2><i class="fa-solid fa-pen-to-square"></i> Editar Postagem</h2>
            <p>Altere o título e o conteúdo da sua publicação.</p>
        </div>

        <section class="card-form">
            <form action="processar-edit-post.php" method="POST">
                
                <input type="hidden" name="id" value="<?php echo $post['id']; ?>">

                <div class="form-group">
                    <label for="titulo">Título da Postagem</label>
                    <input type="text" id="titulo" name="titulo" value="<?php echo $post['titulo']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="conteudo">Conteúdo</label>
                    <textarea id="conteudo" name="conteudo" style="width: 100%; min-height: 200px; padding: 15px; border-radius: 8px; border: 1px solid #ccc; font-family: sans-serif;"><?php echo $post['conteudo']; ?></textarea>
                </div>

                <div class="form-row" style="display: flex; gap: 15px;">
                    <div class="form-group" style="flex: 1;">
                        <label for="status">Status</label>
                        <select id="status" name="status">
                            <option value="Ativo" <?php echo ($post['status'] == 'Ativo') ? 'selected' : ''; ?>>Publicado (Ativo)</option>
                            <option value="Inativo" <?php echo ($post['status'] == 'Inativo') ? 'selected' : ''; ?>>Rascunho (Inativo)</option>
                        </select>
                    </div>
                </div>

                <div class="form-actions" style="margin-top: 20px;">
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-check"></i> Salvar Alterações
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