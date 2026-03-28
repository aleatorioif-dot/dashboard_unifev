<?php
// 1. Importa a conexão com o banco de dados
include 'conexao.php';

// 2. Busca as postagens do banco
$sql = "SELECT * FROM postagens ORDER BY id DESC";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Postagens</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="dash.css">
</head>
<body>

<div class="dashboard-container">
    
    <?php include 'menu.php'; ?>

    <main class="content">
        <div class="header-content" style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h2>Gestão de Postagens</h2>
                <p>Crie, edite e publique conteúdos no seu site.</p>
            </div>
            <a href="cad-postagem.php" class="btn-save" style="text-decoration: none;">
                <i class="fa-solid fa-file-pen"></i> Nova Postagem
            </a>
        </div>

        <?php if(isset($_GET['msg'])): ?>
            <div style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
                Ação realizada com sucesso!
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Nº</th> 
                        <th>Título</th>
                        <th>Data de Criação</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1; 
                    if ($resultado && $resultado->num_rows > 0) {
                        while($post = $resultado->fetch_assoc()) { 
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td> 
                        <td><strong><?php echo $post['titulo']; ?></strong></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($post['data_criacao'])); ?></td>
                        <td>
                            <span class="badge <?php echo ($post['status'] == 'Ativo') ? 'ativa' : 'inativa'; ?>">
                                <?php echo $post['status']; ?>
                            </span>
                        </td>
                        <td>
                            <a href="edit-postagem.php?id=<?php echo $post['id']; ?>" class="btn-icon">
                                <i class="fa-solid fa-pen"></i>
                            </a>

                            <a href="processar-status-post.php?id=<?php echo $post['id']; ?>&status=<?php echo $post['status']; ?>" class="btn-icon">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            <a href="processar-excluir-post.php?id=<?php echo $post['id']; ?>" class="btn-icon" onclick="return confirm('Deseja excluir esta postagem?')">
                                <i class="fa-solid fa-trash" style="color: #e74c3c;"></i>
                            </a>
                        </td>
                    </tr>
                    <?php 
                        } 
                    } else {
                        echo "<tr><td colspan='5'>Nenhuma postagem encontrada.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</div>

</body>
</html>