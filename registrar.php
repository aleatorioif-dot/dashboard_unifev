<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Conta</title>
    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="body-login">
    <div class="login-main-container">
        <div class="login-left-side">
            <h2>Signup</h2>
            <form action="processa-registro.php" method="POST" style="width: 100%;">
                <input type="text" name="nome" placeholder="Nome Completo" class="login-input" required>
                <input type="email" name="email" placeholder="E-Mail" class="login-input" required>
                <input type="password" name="senha" placeholder="Crie uma Senha" class="login-input" required>
                <button type="submit" class="login-btn-green">Criar Conta</button>
            </form>
        </div>

        <div class="login-welcome-side">
            <div>
                <h2>Hello!</h2>
                <p>Já tem uma conta? Entre agora para continuar.</p>
                <a href="login.php" style="text-decoration: none;">
                    <button class="login-btn-outline">Signin</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>