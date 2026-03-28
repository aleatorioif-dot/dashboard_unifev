<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpeza dos dados
    $titulo   = $conn->real_escape_string($_POST['titulo']);
    $conteudo = $conn->real_escape_string($_POST['conteudo']);
    $status   = $conn->real_escape_string($_POST['status']);

    // SQL de inserção
    $sql = "INSERT INTO postagens (titulo, conteudo, status) VALUES ('$titulo', '$conteudo', '$status')";

    if ($conn->query($sql) === TRUE) {
        header("Location: postagens.php?msg=sucesso");
        exit();
    } else {
        echo "Erro ao postar: " . $conn->error;
    }
}
$conn->close();
?>