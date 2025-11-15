<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<h1 class="text-center mt-4">Nossos Clientes</h1>

<div class="text-center mb-4">
    <a href="adicionar_cliente.html" class="btn btn-success btn-lg">Cadastrar Cliente</a>
    <a href="../painel.html" class="btn btn-secondary btn-lg">Voltar</a>
</div>

<div class="container">
    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $conn = new mysqli("localhost", "root", "", "sitedb");
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        $sql = "SELECT ID, NOME, CPF, EMAIL FROM CLIENTE ORDER BY NOME";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $linha['ID'] . "</td>";
                echo "<td>" . $linha['NOME'] . "</td>";
                echo "<td>" . $linha['CPF'] . "</td>";
                echo "<td>" . $linha['EMAIL'] . "</td>";
                echo "<td>

                        <form method='POST' action='Editar/editar_cliente.php' style='display:inline;'>
                            <input type='hidden' name='id' value='" . $linha['ID'] . "'>
                            <input type='submit' value='Editar' class='btn btn-primary btn-sm'>
                        </form>
             
                        

                        <form method='POST' action='Delete/delete_banco_cliente.php' style='display:inline;'>
                            <input type='hidden' name='id' value='" . $linha['ID'] . "'>
                            <input type='submit' value='Excluir' class='btn btn-danger btn-sm'>
                        </form>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' class='text-center'>Nenhum cliente encontrado</td></tr>";
        }

        $conn->close();
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
