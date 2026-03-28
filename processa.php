<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome   = $_POST['nome'];
    $email  = $_POST['email'];
    $senha  = $_POST['senha']; 
    $nivel_vido_do_html = $_POST['nivel']; // O name no seu HTML é 'nivel'

    // CONVERSÃO MANUAL (Para o Banco não se perder)
    if ($nivel_vido_do_html == "2") {
        $acesso_para_o_banco = "Administrador";
    } else {
        $acesso_para_o_banco = "Usuário";
    }

    $sql = "INSERT INTO usuarios (nome, email, acesso, status) 
            VALUES ('$nome', '$email', '$acesso_para_o_banco', 'Ativo')";

    if ($conn->query($sql) === TRUE) {
        header("Location: usuarios.php?msg=cadastrado");
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>