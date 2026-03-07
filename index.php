<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Completo</title>
    <link rel="stylesheet" href="dash.css">
</head>
<body>

    <div class="dashboard-container">
        
        <nav>
            <ul>
                <li><a href="#">Início</a></li>
                <li><a href="#">Projetos</a></li>
                <li><a href="#">Relatórios</a></li>
                <li><a href="#">Configurações</a></li>
            </ul>

            <div class="perfil-usuario">
                <img src="https://ui-avatars.com/api/?name=Igor+Fernando+Silva+Lemes&background=000001&color=fff" alt="Avatar">
                <span>Igor Fernando Silva Lemes</span>
            </div>
        </nav>

        <main>
            <h1>Painel Administrativo</h1>
            
            <section class="container-cards">
                <article>
                    <h2>Módulo de Usuários</h2>
                    <p>Gerencie os acessos e permissões do sistema nesta área.</p>
                    <a href="#" class="btn">Acessar</a>
                </article>

                <article>
                    <h2>Projetos Ativos</h2>
                    <p>Acompanhe o status e os prazos de todos os projetos.</p>
                    <a href="#" class="btn">Acessar</a>
                </article>

                <article>
                    <h2>Relatórios Mensais</h2>
                    <p>Extraia dados detalhados sobre o desempenho.</p>
                    <a href="#" class="btn">Acessar</a>
                </article>
            </section>
        </main>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> - Desenvolvido na aula de Web I</p>
    </footer>

</body>
</html>