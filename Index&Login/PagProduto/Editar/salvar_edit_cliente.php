<?php
// Conexão direta com o banco
$conn = new mysqli("localhost", "root", "", "sitedb");

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];

    $sql = "UPDATE CLIENTE 
            SET NOME = '$nome', CPF = '$cpf', EMAIL = '$email'
            WHERE ID = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Cliente alterado com sucesso!";
    } else {
        echo "Erro ao alterar: " . $conn->error;
    }

    echo '<br><a href="../cliente.php"><button>Voltar</button></a>';
}

$conn->close();
?>
