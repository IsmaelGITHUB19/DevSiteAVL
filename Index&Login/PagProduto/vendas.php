<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Histórico de Vendas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<h1 class="text-center mt-4">Histórico de Vendas</h1>

<div class="text-center mb-4">
    <a href="adicionar_venda.php" class="btn btn-success btn-lg">Registrar Venda</a>
    <a href="../painel.html" class="btn btn-secondary btn-lg">Voltar</a>
</div>

<div class="container">
    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID Venda</th>
                <th>Pagamento</th>
                <th>Produto</th>
                <th>Valor</th>
                <th>Cliente</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $conn = new mysqli("localhost", "root", "", "sitedb");
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        $sql = "SELECT 
                    v.ID AS VENDA_ID,
                    v.PAGAMENTO,
                    p.DESCRICAO AS PRODUTO_DESCRICAO,
                    p.VALOR AS PRODUTO_VALOR,
                    c.NOME AS CLIENTE_NOME
                FROM VENDA v
                JOIN PRODUTO p ON v.PRODUTO_CODIGO = p.CODIGO
                JOIN CLIENTE c ON v.CLIENTE_ID = c.ID
                ORDER BY v.ID";

        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $linha['VENDA_ID'] . "</td>";
                echo "<td>" . $linha['PAGAMENTO'] . "</td>";
                echo "<td>" . $linha['PRODUTO_DESCRICAO'] . "</td>";
                echo "<td>" . $linha['PRODUTO_VALOR'] . "</td>";
                echo "<td>" . $linha['CLIENTE_NOME'] . "</td>";
                echo "<td>
                        <form method='POST' action='Editar/editar_venda.php' style='display:inline;'>
                            <input type='hidden' name='venda_id' value='" . $linha['VENDA_ID'] . "'>
                            <input type='submit' value='Editar' class='btn btn-primary btn-sm'>
                        </form>
                        <form method='POST' action='Delete/delete_banco_venda.php' style='display:inline;'>
                            <input type='hidden' name='venda_id' value='" . $linha['VENDA_ID'] . "'>
                            <input type='submit' value='Excluir' class='btn btn-danger btn-sm'>
                        </form>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6' class='text-center'>Nenhuma venda encontrada</td></tr>";
        }

        $conn->close();
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
