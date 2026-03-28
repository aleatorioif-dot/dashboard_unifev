<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM postagens WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: postagens.php?msg=excluido");
        exit();
    }
}
$conn->close();
?>