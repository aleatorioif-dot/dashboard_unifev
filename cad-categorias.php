<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Categorias</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="dash.css">
</head>
<body>

    <div class="dashboard-container">
        <?php include 'menu.php'; ?>

        <main class="content">
            <div class="header-content">
                <h2><i class="fa-solid fa-folder-plus"></i> Nova Categoria</h2>
                <p>Cadastre uma nova categoria para organizar seus produtos ou serviços.</p>
            </div>

            <section class="card-form">
                <form action="processar-cad-categoria.php" method="POST">
                    
                    <div class="form-group">
                        <label for="nome">Nome da Categoria</label>
                        <input type="text" id="nome" name="nome" placeholder="Ex: Eletrônicos, Alimentos..." required>
                    </div>

                    <div class="form-group">
                        <label for="descricao">Descrição (Opcional)</label>
                        <textarea id="descricao" name="descricao" placeholder="Breve descrição sobre o que esta categoria abrange..." style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ddd; min-height: 100px;"></textarea>
                    </div>

                    <div class="form-row" style="display: flex; gap: 15px;">
                        <div class="form-group" style="flex: 1;">
                            <label for="status">Status Inicial</label>
                            <select id="status" name="status">
                                <option value="Ativo">Ativo</option>
                                <option value="Inativo">Inativo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions" style="margin-top: 20px;">
                        <button type="submit" class="btn-save">
                            <i class="fa-solid fa-floppy-disk"></i> Salvar Categoria
                        </button>
                        <a href="categorias.php" class="btn-cancel">
                            <i class="fa-solid fa-xmark"></i> Cancelar
                        </a>
                    </div>
                </form>
            </section>
        </main>
    </div>

    <?php if(file_exists('footer.php')) include 'footer.php'; ?>

</body>
</html>