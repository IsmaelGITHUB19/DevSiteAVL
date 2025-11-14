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

$pagamento      = $_POST['pagamento'];
$cliente_id     = $_POST['cliente_id'];
$produto_codigo = $_POST['produto_codigo'];

$sql = "INSERT INTO VENDA (PAGAMENTO, CLIENTE_ID, PRODUTO_CODIGO) VALUES (
    '$pagamento',
    $cliente_id,
    $produto_codigo
)";

if ($conn->query($sql)) {
    echo "Venda cadastrada com sucesso!";
} else {
    echo "Erro ao cadastrar venda: " . $conn->error;
}
?>

<html>
    <a href="../vendas.php">
        <input type="button" value="Voltar"/>
    </a>
</html>
