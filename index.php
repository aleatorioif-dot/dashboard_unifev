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
                    <i class="fas fa-tags fa-2x"></i>
                    <h2>Categorias</h2>
                    <p>Gerencie as categorias das suas postagens.</p>
                    <a href="categorias.php" class="btn">Acessar</a>
                </article>

                <article>
                    <i class="fas fa-file-alt fa-2x"></i>
                    <h2>Postagens</h2>
                    <p>Crie, edite ou remova artigos e conteúdos.</p>
                    <a href="postagens.php" class="btn">Acessar</a>
                </article>

                <article>
                    <i class="fas fa-user-cog fa-2x"></i>
                    <h2>Usuários</h2>
                    <p>Controle de perfis, níveis de acesso e permissões.</p>
                    <a href="usuarios.php" class="btn">Acessar</a>
                </article>

            </section>
        </main>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>