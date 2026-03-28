<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Pega os dados do formulário
    $id     = $_POST['id'];
    $nome   = $_POST['nome'];
    $email  = $_POST['email'];
    $acesso = $_POST['acesso']; // Isso aqui tem que ser igual ao 'name' do select

    // 2. Prepara o comando SQL
    // Importante: use aspas simples nas variáveis dentro do comando
    $sql = "UPDATE usuarios SET nome='$nome', email='$email', acesso='$acesso' WHERE id='$id'";

    // 3. Executa no banco de dados
    if ($conn->query($sql) === TRUE) {
        // Se der certo, volta para a lista com um aviso na URL
        header("Location: usuarios.php?msg=editado");
        exit;
    } else {
        // Se der erro, mostra qual foi o erro do MySQL
        echo "Erro ao atualizar banco: " . $conn->error;
    }
} else {
    header("Location: usuarios.php");
    exit;
}

$conn->close();
?>