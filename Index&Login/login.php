<?php
session_start();

// 1. Conexão com o banco
$conn = new mysqli("localhost", "root", "", "sitedb");
if ($conn->connect_error) {
    die("Erro interno. Tente novamente mais tarde."); 
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // 2. Recebe e trata os dados
    $email = trim($_POST['email']);
    $senha = md5($_POST['senha']); 
    $emailSeguro = $conn->real_escape_string($email);

    $sql = "SELECT u.ID, u.SENHA 
            FROM USUARIO u 
            JOIN FUNCIONARIO f ON f.ID = u.FUNCIONARIO_ID 
            WHERE f.EMAIL = '$emailSeguro'";

    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if ($senha === $user['SENHA']) {
            // Login OK
            $_SESSION['user_id'] = $user['ID'];
            
            $conn->close();
            header("Location: painel.html"); // Redireciona para painel.html
            exit;
        } else {
            // Senha incorreta
            $_SESSION['erro'] = "Senha incorreta!";
            $conn->close();
            header("Location: login.html");
            exit;
        }
    } else {
        // Email não encontrado
        $_SESSION['erro'] = "Email não encontrado!";
        $conn->close();
        header("Location: login.html");
        exit;
    }

} else {
    header("Location: login.html");
    exit;
}
?>