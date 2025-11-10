<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Avaliações</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<h1 class="text-center mt-4">Avaliações dos Clientes</h1>

<div class="text-center mb-4">
    <a href="adicionar_avalicao.html" class="btn btn-success btn-lg">Adicionar Avaliação</a>
    <a href="../painel.html" class="btn btn-secondary btn-lg">Voltar</a>
</div>

<div class="container">
    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nota</th>
                <th>Opinião</th>
                <th>Nome do Cliente</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php

        $conn = new mysqli("localhost", "root", "", "sitedb");
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Consulta para buscar as avaliações e o nome do cliente
        $sql = "SELECT A.ID, A.NOTA, A.OPN, A.NOME_CLIENTE 
                FROM AVALIACAO AS A 
                ORDER BY A.ID DESC";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $linha['ID'] . "</td>";
                echo "<td>" . $linha['NOTA'] . "</td>";
                echo "<td>" . $linha['OPN'] . "</td>";
                echo "<td>" . $linha['NOME_CLIENTE'] . "</td>";
                echo "<td>
                        <form method='POST' action='Editar/editar_avaliacao.php' style='display:inline;'>
                            <input type='hidden' name='id' value='" . $linha['ID'] . "'>
                            <input type='submit' value='Editar' class='btn btn-primary btn-sm'>
                        </form>
                        <form method='POST' action='Delete/delete_banco_avaliacao.php' style='display:inline;'>
                            <input type='hidden' name='id' value='" . $linha['ID'] . "'>
                            <input type='submit' value='Excluir' class='btn btn-danger btn-sm'>
                        </form>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' class='text-center'>Nenhuma avaliação encontrada</td></tr>";
        }

        $conn->close();
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
