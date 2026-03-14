<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="dash.css">
</head>
<body>

    <div class="dashboard-container">
        <?php include 'menu.php'; ?>

        <main>
            <h1>Painel Administrativo</h1>
            <section class="container-cards">
                <article>
                    <h2>Módulo de Usuários</h2>
                    <p>Gerencie os acessos e permissões do sistema nesta área.</p>
                    <a href="usuarios.php" class="btn">Acessar</a>
                </article>
                
                <article>
                    <h2>Projetos Ativos</h2>
                    <p>Acompanhe o status e os prazos de todos os projetos.</p>
                    <a href="#" class="btn">Acessar</a>
                </article>
            </section>
        </main>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>