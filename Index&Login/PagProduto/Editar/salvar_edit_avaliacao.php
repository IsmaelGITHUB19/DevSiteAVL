<?php
session_start();

$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "sitedb";

// Conexão
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Captura dos dados enviados pelo formulário
$id           = $_POST['id'];
$nota         = $_POST['nota'];
$opn          = $_POST['opn'];
$nome_cliente = $_POST['nome_cliente'];
$id_cliente   = $_POST['id_cliente'];

// Atualização dos dados da avaliação
$sql = "UPDATE AVALIACAO 
        SET NOTA = '$nota', 
            OPN = '$opn', 
            NOME_CLIENTE = '$nome_cliente', 
            ID_CLIENTE = $id_cliente
        WHERE ID = $id";

if ($conn->query($sql)) {
    echo "Avaliação atualizada com sucesso!";
} else {
    echo "Erro ao atualizar avaliação: " . $conn->error;
}

$conn->close();
?>

<html>
    <a href="../avaliacoes.php">
        <input type="button" value="Voltar"/>
    </a>
</html>
