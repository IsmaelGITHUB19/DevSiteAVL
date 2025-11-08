<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Avaliações dos Clientes</title>
</head>
<body>

<h1>Avaliações dos Clientes</h1>

<a href="adicionar_avaliacao.html">Cadastrar Avaliação</a> |
<a href="../painel.html">Voltar</a>
<br><br>

<?php
$conn = new mysqli("localhost", "root", "", "sitedb");

if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados.");
}

$sql = "SELECT A.ID, C.NOME AS CLIENTE, A.NOTA, A.OPN
        FROM AVALIACAO A
        JOIN CLIENTE C ON A.ID_CLIENTE = C.ID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Nota</th>
            <th>Opinião</th>
            <th>Ações</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['CLIENTE'] . "</td>";
        echo "<td>" . $row['NOTA'] . "</td>";
        echo "<td>" . $row['OPN'] . "</td>";
        echo "<td>";
        echo "<a href='Editar/editar_avaliacao.php?id=" . $row['ID'] . "'>Editar</a> | ";
        echo "<a href='Delete/delete_avaliacao.php?id=" . $row['ID'] . "'>Excluir</a>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhuma avaliação encontrada.";
}

$conn->close();
?>

</body>
</html>
