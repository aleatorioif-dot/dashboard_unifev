<?php
// 1. Conexão com o banco
require_once 'conexao.php';

// 2. Captura o ID vindo da URL
$id_usuario = isset($_GET['id']) ? $_GET['id'] : null;

// 3. Se houver um ID, busca os dados reais no banco
if ($id_usuario) {
    $sql = "SELECT * FROM usuarios WHERE id = '$id_usuario'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $user = $resultado->fetch_assoc();
        // Preenche as variáveis com os dados do banco
        $nome_atual   = $user['nome'];
        $email_atual  = $user['email'];
        $acesso_atual = $user['acesso'];
    } else {
        echo "Usuário não encontrado.";
        exit;
    }
} else {
    echo "ID inválido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="dash.css">
</head>
<body>

<div class="dashboard-container">
    <nav class="sidebar">
        <ul>
            <li><a href="index.php"><i class="fa-solid fa-house"></i> Início</a></li>
            <li><a href="usuarios.php"><i class="fa-solid fa-users"></i> Usuários</a></li>
            <li><a href="#"><i class="fa-solid fa-folder"></i> Projetos</a></li>
            <li><a href="#"><i class="fa-solid fa-gear"></i> Configurações</a></li>
        </ul>
        <div class="perfil-usuario">
            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($nome_atual); ?>&background=000001&color=fff" alt="Avatar">
            <span><?php echo $nome_atual; ?></span>
        </div>
    </nav>

    <main class="content">
        <div class="header-content">
            <h2>Editar Usuário</h2>
            <p>Alterando informações do ID: <strong>#<?php echo $id_usuario; ?></strong></p>
        </div>

        <article style="max-width: 600px; margin-top: 20px;">
            <form action="processar-edicao.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id_usuario; ?>">

                <div style="margin-bottom: 15px;">
                    <label>Nome Completo</label>
                    <input type="text" name="nome" class="login-input" value="<?php echo $nome_atual; ?>" required style="border: 1px solid #ccc;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label>E-mail</label>
                    <input type="email" name="email" class="login-input" value="<?php echo $email_atual; ?>" required style="border: 1px solid #ccc;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label>Nível de Acesso</label>
                    <select name="acesso" class="login-input" style="border: 1px solid #ccc; width: 100%; height: 50px;">
                        <option value="Administrador" <?php if($acesso_atual == 'Administrador') echo 'selected'; ?>>Administrador</option>
                        <option value="Editor" <?php if($acesso_atual == 'Editor') echo 'selected'; ?>>Editor</option>
                        <option value="Usuário" <?php if($acesso_atual == 'Usuário') echo 'selected'; ?>>Usuário</option>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-floppy-disk"></i> Salvar Alterações
                    </button>
                    <a href="usuarios.php" class="btn-cancel">
                        <i class="fa-solid fa-xmark"></i> Cancelar
                    </a>
                </div>
            </form>
        </article>
    </main>
</div>

</body>
</html>