<?php
session_start();
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    // --- REGRA DO ADMIN MESTRE (LOGIN FIXO) ---
    if ($email == "admin@admin.com" && $senha == "adminadmin") {
        $_SESSION['usuario_id'] = 0;
        $_SESSION['usuario_nome'] = "Administrador Mestre";
        $_SESSION['usuario_acesso'] = "Administrador";

        header("Location: index.php");
        exit;
    }
    // ------------------------------------------

    // Se não for o admin mestre, busca no banco normalmente
    $email_safe = $conn->real_escape_string($email);
    $sql = "SELECT * FROM usuarios WHERE email = '$email_safe'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $user = $resultado->fetch_assoc();

        // Comparação de senha simples (texto puro)
        if ($senha == $user['senha']) {
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_nome'] = $user['nome'];
            $_SESSION['usuario_acesso'] = $user['acesso'];

            header("Location: index.php");
            exit;
        } else {
            header("Location: login.php?erro=senha");
            exit;
        }
    } else {
        header("Location: login.php?erro=usuario");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}

$conn->close();
?>