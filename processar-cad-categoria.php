<?php
// 1. Importa a conexão com o banco de dados
include 'conexao.php';

// 2. Verifica se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 3. Captura e limpa os dados para evitar SQL Injection básico
    $nome      = $conn->real_escape_string($_POST['nome']);
    $descricao = $conn->real_escape_string($_POST['descricao']);
    $status    = $conn->real_escape_string($_POST['status']);

    // 4. Monta a SQL de inserção
    // Certifique-se de que a tabela 'categorias' existe com essas colunas
    $sql = "INSERT INTO categorias (nome, descricao, status) VALUES ('$nome', '$descricao', '$status')";

    // 5. Executa a query e verifica o resultado
    if ($conn->query($sql) === TRUE) {
        // Redireciona de volta para a listagem com uma mensagem de sucesso
        header("Location: categorias.php?msg=sucesso");
        exit();
    } else {
        // Em caso de erro, exibe o erro (útil para debug)
        echo "Erro ao cadastrar: " . $conn->error;
    }
} else {
    // Se tentarem acessar este arquivo direto pela URL, redireciona de volta
    header("Location: cad-categorias.php");
    exit();
}

// Fecha a conexão
$conn->close();
?>