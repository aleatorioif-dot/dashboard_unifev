<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha']; 
    // Como é um registro externo, definimos um nível padrão
    $acesso = "Usuário";
    $status = "Ativo";

    // Comando SQL
    $sql = "INSERT INTO usuarios (nome, email, acesso, status) VALUES ('$nome', '$email', '$acesso', '$status')";

    if ($conn->query($sql) === TRUE) {
        // Redireciona para o login após cadastrar
        header("Location: login.php?msg=sucesso");
        exit;
    } else {
        echo "Erro ao registrar: " . $conn->error;
    }
}
$conn->close();
?>