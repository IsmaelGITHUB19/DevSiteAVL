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

    if(isset($_POST['codigo'])){

        $codigo = $_POST['codigo'];
        $sql = "DELETE FROM PRODUTO WHERE CODIGO = '$codigo'";

        if ($conn -> query($sql)){
            echo "Produto excluido";
        }
        else{
            echo "Problema na exclusão";
        }
    }
?>
<html>
   <a href="../produto.php">
    <input type="button" value="Voltar"/>
    </a>
</html>