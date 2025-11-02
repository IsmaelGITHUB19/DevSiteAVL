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

if (isset($_POST['venda_id'])) {

    $id = $_POST['venda_id'];
    $sql = "DELETE FROM VENDA WHERE ID = '$id'";

    if ($conn->query($sql)) {
        echo "Venda excluída com sucesso.";
    } else {
        echo "Problema na exclusão: " . $conn->error;
    }
}
?>

<html>
    <a href="../vendas.php">
        <input type="button" value="Voltar"/>
    </a>
</html>
