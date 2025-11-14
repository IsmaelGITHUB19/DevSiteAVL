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

$nota          = $_POST['nota'];
$opn           = $_POST['opn'];
$nome_cliente  = $_POST['nome_cliente'];
$id_cliente    = $_POST['id_cliente'];

$sql = "INSERT INTO AVALIACAO (NOTA, OPN, NOME_CLIENTE, ID_CLIENTE) VALUES (
    '$nota',
    '$opn',
    '$nome_cliente',
    $id_cliente
)";

if ($conn->query($sql)) {
    echo "Avaliação cadastrada com sucesso!";
} else {
    echo "Erro ao cadastrar avaliação: " . $conn->error;
}
?>

<html>
    <a href="../avaliacoes.php">
        <input type="button" value="Voltar"/>
    </a>
</html>
