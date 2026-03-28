<?php
// 1. Importa a conexão com o banco de dados
include 'conexao.php';

// 2. Busca as categorias direto do MySQL
// Ajustei a tabela para 'categorias'
$sql = "SELECT * FROM categorias ORDER BY id ASC";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Categorias</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="dash.css">
</head>
<body>

<div class="dashboard-container">
    
    <?php include 'menu.php'; ?>

    <main class="content">
        <div class="header-content" style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h2>Gestão de Categorias</h2>
                <p>Organize e gerencie as categorias do sistema.</p>
            </div>
            <a href="cad-categorias.php" class="btn-save" style="text-decoration: none;">
                <i class="fa-solid fa-plus"></i> Nova Categoria
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
                        <th>Nome da Categoria</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1; 
                    
                    if ($resultado && $resultado->num_rows > 0) {
                        while($cat = $resultado->fetch_assoc()) { 
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td> 
                        <td><strong><?php echo $cat['nome']; ?></strong></td>
                        <td><?php echo $cat['descricao'] ?? '---'; ?></td>
                        <td>
                            <span class="badge <?php echo ($cat['status'] == 'Ativo') ? 'ativa' : 'inativa'; ?>">
                                <?php echo $cat['status']; ?>
                            </span>
                        </td>
                        <td>
                            <a href="edit-categoria.php?id=<?php echo $cat['id']; ?>" class="btn-icon">
                                <i class="fa-solid fa-pen"></i>
                            </a>

                            <a href="processar-status-cat.php?id=<?php echo $cat['id']; ?>&status=<?php echo $cat['status']; ?>" class="btn-icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                            </a>

                            <a href="processar-excluir-cat.php?id=<?php echo $cat['id']; ?>" class="btn-icon" onclick="return confirm('Deseja excluir esta categoria?')">
                                <i class="fa-solid fa-trash" style="color: #e74c3c;"></i>
                            </a>
                        </td>
                    </tr>
                    <?php 
                        } 
                    } else {
                        echo "<tr><td colspan='5'>Nenhuma categoria encontrada.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</div>

</body>
</html>