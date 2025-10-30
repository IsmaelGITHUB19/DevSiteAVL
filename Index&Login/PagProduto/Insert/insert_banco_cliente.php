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

// Insert Funcionario
$sql = "INSERT INTO CLIENTE ( NOME, CPF, EMAIL ) VALUES (
    '" . $_POST['nome'] . "',
    '" . $_POST['cpf'] . "',
    '" . $_POST['email'] . "'
)"; // ✅ sem vírgula antes do fechamento

if ($conn->query($sql)) {
    echo "Cliente cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}
?>

<html>
    <a href="../cliente.php">
        <input type="button" value="Voltar"/>
    </a>
</html>
