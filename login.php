<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="dash.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="body-login"> 
    <div class="login-main-container">
        <div class="login-left-side">
            <h2>Signin</h2>
            <form action="valida_login.php" method="POST" style="width: 100%;">
                <input type="email" name="email" placeholder="E-Mail" class="login-input" required>
                <input type="password" name="senha" placeholder="Senha" class="login-input" required>
                <button type="submit" class="login-btn-green">Signin</button>
            </form>
            
            <div class="login-social-icons">
                <a href="#" class="login-icon-circle" style="background:#3b5998"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="login-icon-circle" style="background:#db4437"><i class="fab fa-google"></i></a>
                <a href="#" class="login-icon-circle" style="background:#0077b5"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>

        <div class="login-welcome-side">
            <div>
                <h2>Welcome back!</h2>
                <p>Welcome back! We are so happy to have you here. It's great to see you again.</p>
                
                <a href="registrar.php" style="text-decoration: none;">
                    <button class="login-btn-outline">No account yet? Signup.</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>