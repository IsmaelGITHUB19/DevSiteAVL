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
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $cargo = $_POST['cargo'];
    $endereco = $_POST['endereco'];

    $sql = "UPDATE FUNCIONARIO
            SET NOME = '$nome', CPF = '$cpf', EMAIL = '$email', CARGO = '$cargo', ENDERECO = '$endereco' ";
            
    if ($conn->query($sql) === TRUE) {
        echo "Funcionário alterado com sucesso!";
    } else {
        echo "Erro ao alterar: " . $conn->error;
    }
}

$conn->close();
?>

<html>
    <a href="../funcionarios.php">
        <input type="button" value="Voltar"/>
    </a>
</html>
