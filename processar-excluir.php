<?php
require_once 'conexao.php';

// Verifica se o ID foi enviado pela URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Comando SQL para deletar o registro
    $sql = "DELETE FROM usuarios WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        // Redireciona de volta para a tabela com um aviso de sucesso
        header("Location: usuarios.php?msg=excluido");
        exit;
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }
} else {
    // Se não houver ID, apenas volta para a lista
    header("Location: usuarios.php");
    exit;
}

$conn->close();
?>