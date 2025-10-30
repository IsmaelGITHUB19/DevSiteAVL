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
$sql = "INSERT INTO FUNCIONARIO ( NOME, CPF, EMAIL, CARGO, ENDERECO) VALUES (
    '" . $_POST['nome'] . "',
    '" . $_POST['cpf'] . "',
    '" . $_POST['email'] . "',
    '" . $_POST['cargo'] . "',
    '" . $_POST['endereco'] . "'
)"; // ✅ sem vírgula antes do fechamento

if ($conn->query($sql)) {
    echo "Funcionário cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}
?>

<html>
    <a href="../funcionarios.php">
        <input type="button" value="Voltar"/>
    </a>
</html>
