<?php 
session_start();

$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "sitedb";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];

    $sql = "UPDATE PRODUTO
            SET DESCRICAO = '$descricao', VALOR = '$valor' 
            WHERE CODIGO = $codigo";

    if ($conn->query($sql) === TRUE) {
        echo "Produto alterado com sucesso!";
    } else {
        echo "Erro ao alterar: " . $conn->error;
    }
}

$conn->close();
?>

<html>
    <a href="../produto.php">
        <input type="button" value="Voltar"/>
    </a>
</html>
