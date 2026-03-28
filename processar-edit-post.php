<?php
// 1. Conexão com o banco
include 'conexao.php';

// 2. Verifica se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 3. Captura os dados (incluindo o ID escondido no form)
    $id        = intval($_POST['id']); // ID para saber qual post editar
    $titulo    = $conn->real_escape_string($_POST['titulo']);
    $conteudo  = $conn->real_escape_string($_POST['conteudo']);
    $status    = $conn->real_escape_string($_POST['status']);

    // 4. Monta a SQL de atualização (UPDATE)
    // O 'WHERE id = $id' é obrigatório, senão você altera todos os posts do banco!
    $sql = "UPDATE postagens SET 
            titulo = '$titulo', 
            conteudo = '$conteudo', 
            status = '$status' 
            WHERE id = $id";

    // 5. Executa e verifica o sucesso
    if ($conn->query($sql) === TRUE) {
        // Redireciona com uma mensagem de sucesso na URL
        header("Location: postagens.php?msg=editado");
        exit();
    } else {
        // Exibe o erro caso algo dê errado no SQL (útil para debug)
        echo "Erro ao atualizar postagem: " . $conn->error;
    }

} else {
    // Se tentarem acessar este arquivo direto pela URL, volta para a lista
    header("Location: postagens.php");
    exit();
}

// 6. Fecha a conexão
$conn->close();
?>