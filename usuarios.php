<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gestão de Usuários</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="dash.css">
</head>
<body>

<main>
    <div class="header-content">
        <h2>Gestão de Usuários</h2>
        <p>Visualize e gerencie as permissões dos usuários do sistema.</p>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Acesso</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>Igor Fernando Silva Lemes</td>
                    <td>aleatorioif@gmail.com</td>
                    <td>Administrador</td>
                    <td><span class="badge ativa">Ativo</span></td>
                    <td>
                        <button class="btn-icon"><i class="fa-solid fa-pen"></i></button>
                        <button class="btn-icon"><i class="fa-solid fa-eye"></i></button>
                        <button class="btn-icon"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>02</td>
                    <td>Ana Souza</td>
                    <td>ana.souza@email.com</td>
                    <td>Editor</td>
                    <td><span class="badge ativa">Ativo</span></td>
                    <td>
                        <button class="btn-icon"><i class="fa-solid fa-pen"></i></button>
                        <button class="btn-icon"><i class="fa-solid fa-eye"></i></button>
                        <button class="btn-icon"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>03</td>
                    <td>Carlos Lima</td>
                    <td>carlos.lima@servidor.com</td>
                    <td>Usuário</td>
                    <td><span class="badge inativa">Inativo</span></td>
                    <td>
                        <button class="btn-icon"><i class="fa-solid fa-pen"></i></button>
                        <button class="btn-icon"><i class="fa-solid fa-eye"></i></button>
                        <button class="btn-icon"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>

</body>
</html>