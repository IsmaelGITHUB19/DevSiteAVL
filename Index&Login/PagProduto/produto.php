<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos (CRUD)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h1 class="text-center mb-4">Nossos Livros de Filosofia</h1>

        <div class="text-center mb-4">
            <a href="adicionar_produto.html" class="btn btn-success btn-lg mx-2">Adicionar Novo Produto</a>
            <a href="vendas.php" class="btn btn-success btn-lg mx-2">Vendas</a>
            <a href="../painel.html" class="btn btn-secondary btn-lg mx-2">Voltar</a>
        </div>

        <?php
        // --- 1. CONEXÃO E CONFIGURAÇÃO ---
        $conn = new mysqli("localhost", "root", "", "sitedb");
        if ($conn->connect_error) {
            die("<div class='alert alert-danger'>Erro interno. Tente novamente mais tarde.</div>");
        }

        $sql = "SELECT CODIGO, DESCRICAO, VALOR FROM PRODUTO ORDER BY DESCRICAO";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            echo '<table class="table table-striped table-bordered table-hover shadow-sm">';
            echo '<thead class="thead-dark">';
            echo '<tr>';
            echo '<th>Código</th>';
            echo '<th>Descrição</th>';
            echo '<th>Valor</th>';
            echo '<th>Ações</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($linha = $resultado->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $linha['CODIGO'] . '</td>';
                echo '<td>' . htmlspecialchars($linha['DESCRICAO']) . '</td>';
                echo '<td>R$ ' . number_format($linha['VALOR'], 2, ',', '.') . '</td>';
                echo '<td>';

                // Formulário de edição
                echo '<form method="POST" action="Editar/editar_produto.php" style="display:inline;">';
                echo '<input type="hidden" name="codigo" value="' . $linha['CODIGO'] . '">';
                echo '<button type="submit" class="btn btn-primary btn-sm">Editar</button>';
                echo '</form> ';

                // Formulário de exclusão
                echo '<form method="POST" action="Delete/delete_banco.php" style="display:inline;">';
                echo '<input type="hidden" name="codigo" value="' . $linha['CODIGO'] . '">';
                echo '<button type="submit" class="btn btn-danger btn-sm">Excluir</button>';
                echo '</form>';

                echo '</td>';
                echo '</tr>';
            }

            echo '</tbody></table>';
        } else {
            echo '<div class="alert alert-warning text-center">Nenhum produto encontrado.</div>';
        }

        $conn->close();
        ?>
    </div>

</body>
</html>
