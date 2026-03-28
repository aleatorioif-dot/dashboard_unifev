<?php
// 1. Importa a conexão com o banco de dados
include 'conexao.php';

// 2. Verifica se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 3. Captura os dados (incluindo o ID que está escondido no form)
    // Usamos real_escape_string para evitar erros com aspas e SQL Injection
    $id        = $_POST['id'];
    $nome      = $conn->real_escape_string($_POST['nome']);
    $descricao = $conn->real_escape_string($_POST['descricao']);
    $status    = $conn->real_escape_string($_POST['status']);

    // 4. Monta a SQL de atualização (UPDATE)
    // É CRUCIAL ter o "WHERE id = $id", senão você altera todas as categorias do banco!
    $sql = "UPDATE categorias SET 
            nome = '$nome', 
            descricao = '$descricao', 
            status = '$status' 
            WHERE id = $id";

    // 5. Executa e verifica o sucesso
    if ($conn->query($sql) === TRUE) {
        // Redireciona com uma mensagem de sucesso na URL
        header("Location: categorias.php?msg=editado");
        exit();
    } else {
        // Exibe o erro caso algo dê errado no SQL
        echo "Erro ao atualizar categoria: " . $conn->error;
    }

} else {
    // Se tentarem acessar o arquivo sem enviar o formulário, volta para a lista
    header("Location: categorias.php");
    exit();
}

// 6. Fecha a conexão
$conn->close();
?>