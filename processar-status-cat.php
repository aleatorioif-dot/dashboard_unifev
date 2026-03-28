<?php
// 1. Importa a conexão com o banco de dados
include 'conexao.php';

// 2. Verifica se o ID e o STATUS atual foram passados via URL (GET)
if (isset($_GET['id']) && isset($_GET['status'])) {
    
    $id = intval($_GET['id']); // Garante que o ID seja um número inteiro
    $status_atual = $_GET['status'];

    // 3. Lógica de inversão: Se for Ativo vira Inativo, se for Inativo vira Ativo
    $novo_status = ($status_atual == 'Ativo') ? 'Inativo' : 'Ativo';

    // 4. Executa a atualização no banco de dados
    $sql = "UPDATE categorias SET status = '$novo_status' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redireciona de volta para a lista com uma mensagem de sucesso
        header("Location: categorias.php?msg=status_alterado");
        exit();
    } else {
        echo "Erro ao alterar status: " . $conn->error;
    }

} else {
    // Se não houver parâmetros, volta para a lista
    header("Location: categorias.php");
    exit();
}

$conn->close();
?>