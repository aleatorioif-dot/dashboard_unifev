<?php
include 'conexao.php';

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = intval($_GET['id']);
    $status_atual = $_GET['status'];
    $novo_status = ($status_atual == 'Ativo') ? 'Inativo' : 'Ativo';

    $sql = "UPDATE postagens SET status = '$novo_status' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: postagens.php?msg=status_alterado");
        exit();
    }
}
$conn->close();
?>