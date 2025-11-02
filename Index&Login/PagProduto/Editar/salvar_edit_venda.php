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
    $id = $_POST['venda_id'];
    $pagamento = $_POST['pagamento'];
    $cliente_id = $_POST['cliente_id'];
    $produto_codigo = $_POST['produto_codigo'];

    $sql = "UPDATE VENDA 
            SET PAGAMENTO = '$pagamento', 
                PRODUTO_CODIGO = '$produto_codigo', 
                CLIENTE_ID = '$cliente_id' 
            WHERE ID = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Venda alterada com sucesso!";
    } else {
        echo "Erro ao alterar: " . $conn->error;
    }
}

$conn->close();
?>

<html>
    <a href="../vendas.php">
        <input type="button" value="Voltar"/>
    </a>
</html>
