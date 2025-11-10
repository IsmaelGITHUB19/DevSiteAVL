<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Funcionários (CRUD)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Funcionários</h1>

        <div class="text-center mb-4">
            <a href="adicionar_funcionario.html" class="btn btn-success btn-lg mx-2">
                Cadastrar Funcionário
            </a>
            <a href="../painel.html" class="btn btn-secondary btn-lg mx-2">
                Voltar
            </a>
        </div>

        <?php
        $conn = new mysqli("localhost", "root", "", "sitedb");
        if ($conn->connect_error) {
            die("<div class='alert alert-danger'>Erro interno. Tente novamente mais tarde.</div>");
        }

        // --- CONSULTA ---
        $sql = "SELECT ID, NOME, CPF, EMAIL, CARGO, ENDERECO FROM FUNCIONARIO";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            echo '<div class="table-responsive">';
            echo '<table class="table table-striped table-bordered table-hover shadow-sm">';
            echo '<thead class="thead-dark">';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Nome</th>';
            echo '<th>CPF</th>';
            echo '<th>Email</th>';
            echo '<th>Cargo</th>';
            echo '<th>Endereço</th>';
            echo '<th>Ações</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($linha = $resultado->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $linha['ID'] . '</td>';
                echo '<td>' . htmlspecialchars($linha['NOME']) . '</td>';
                echo '<td>' . htmlspecialchars($linha['CPF']) . '</td>';
                echo '<td>' . htmlspecialchars($linha['EMAIL']) . '</td>';
                echo '<td>' . htmlspecialchars($linha['CARGO']) . '</td>';
                echo '<td>' . htmlspecialchars($linha['ENDERECO']) . '</td>';
                echo '<td>';
                
                // Botão de editar
                echo '<form method="POST" action="Editar/editar_funcionario.php" style="display:inline-block;">';
                echo '<input type="hidden" name="id" value="' . $linha['ID'] . '">';
                echo '<button type="submit" class="btn btn-primary btn-sm">Editar</button>';
                echo '</form> ';

                // Botão de excluir
                echo '<form method="POST" action="Delete/delete_banco_funcionario.php" style="display:inline-block;">';
                echo '<input type="hidden" name="id" value="' . $linha['ID'] . '">';
                echo '<button type="submit" class="btn btn-danger btn-sm">Excluir</button>';
                echo '</form>';

                echo '</td>';
                echo '</tr>';
            }

            echo '</tbody></table>';
            echo '</div>';
        } else {
            echo '<div class="alert alert-warning text-center">Nenhum funcionário encontrado.</div>';
        }

        $conn->close();
        ?>
    </div>

</body>
</html>
