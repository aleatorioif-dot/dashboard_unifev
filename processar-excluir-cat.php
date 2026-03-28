<?php
// 1. Importa a conexão com o banco de dados
include 'conexao.php';

// 2. Verifica se o ID foi passado via URL (GET)
if (isset($_GET['id'])) {
    
    // Convertemos para inteiro por segurança (evita SQL Injection)
    $id = intval($_GET['id']);

    // 3. Monta a SQL de exclusão
    // CUIDADO: Sem o WHERE, você apaga a tabela inteira!
    $sql = "DELETE FROM categorias WHERE id = $id";

    // 4. Executa a query
    if ($conn->query($sql) === TRUE) {
        // Redireciona de volta para a listagem com uma mensagem de sucesso
        header("Location: categorias.php?msg=excluido");
        exit();
    } else {
        // Caso haja erro (por exemplo, se a categoria estiver sendo usada em outra tabela)
        echo "Erro ao excluir categoria: " . $conn->error;
    }

} else {
    // Se não houver ID, apenas volta para a lista
    header("Location: categorias.php");
    exit();
}

// 5. Fecha a conexão
$conn->close();
?>