<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = conect_banco();     
    insert($conn);      
    $conn->close();            
} else {
    echo "Acesso inválido.";
}

function conect_banco(){
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $database   = "sitedb";
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
    return $conn;
}

function insert($conn) {
    $sql = "INSERT INTO Produto (CODIGO, DESCRICAO, VALOR) VALUES (
        '" . $_POST['codigo'] . "',
        '" . $_POST['descricao'] . "',
        '" . $_POST['valor'] . "'
    )";

    if ($conn->query($sql)) {
        echo "Produto cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}
?>

<html>
   <a href="../produto.php">
    <input type="button" value="Voltar"/>
    </a>
</html>
