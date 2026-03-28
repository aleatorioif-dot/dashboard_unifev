<?php
require_once 'conexao.php';

// 1. Verifica se os dados necessários chegaram pela URL
if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status_atual = $_GET['status'];

    // 2. Lógica de inversão: Se for Ativo vira Inativo, e vice-versa
    $novo_status = ($status_atual == 'Ativo') ? 'Inativo' : 'Ativo';

    // 3. Atualiza o banco de dados
    $sql = "UPDATE usuarios SET status = '$novo_status' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        // 4. Volta para a página de usuários com uma mensagem de sucesso
        header("Location: usuarios.php?msg=status_alterado");
        exit;
    } else {
        echo "Erro ao atualizar status: " . $conn->error;
    }
} else {
    // Se acessar o arquivo sem passar os dados, volta para a lista
    header("Location: usuarios.php");
    exit;
}

$conn->close();
?>