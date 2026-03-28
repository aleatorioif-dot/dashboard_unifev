<?php
include 'conexao.php';

// Verifica se o ID foi passado na URL
if (!isset($_GET['id'])) {
    header("Location: categorias.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM categorias WHERE id = $id";
$resultado = $conn->query($sql);

// Se não encontrar a categoria, volta para a lista
if ($resultado->num_rows == 0) {
    header("Location: categorias.php");
    exit();
}

$cat = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="dash.css">
</head>
<body>

<div class="dashboard-container">
    <?php include 'menu.php'; ?>

    <main class="content">
        <div class="header-content">
            <h2><i class="fa-solid fa-pen-to-square"></i> Editar Categoria</h2>
            <p>Altere as informações da categoria selecionada.</p>
        </div>

        <section class="card-form">
            <form action="processar-edit-cat.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $cat['id']; ?>">

                <div class="form-group">
                    <label for="nome">Nome da Categoria</label>
                    <input type="text" id="nome" name="nome" value="<?php echo $cat['nome']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" name="descricao" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ddd; min-height: 100px;"><?php echo $cat['descricao']; ?></textarea>
                </div>

                <div class="form-row" style="display: flex; gap: 15px;">
                    <div class="form-group" style="flex: 1;">
                        <label for="status">Status</label>
                        <select id="status" name="status">
                            <option value="Ativo" <?php echo ($cat['status'] == 'Ativo') ? 'selected' : ''; ?>>Ativo</option>
                            <option value="Inativo" <?php echo ($cat['status'] == 'Inativo') ? 'selected' : ''; ?>>Inativo</option>
                        </select>
                    </div>
                </div>

                <div class="form-actions" style="margin-top: 20px;">
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-check"></i> Salvar Alterações
                    </button>
                    <a href="categorias.php" class="btn-cancel">
                        <i class="fa-solid fa-xmark"></i> Cancelar
                    </a>
                </div>
            </form>
        </section>
    </main>
</div>

</body>
</html>