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

    if(isset($_POST['id'])){

        $id = $_POST['id'];
        $sql = "DELETE FROM AVALIACAO WHERE ID = '$id'";

        if ($conn -> query($sql)){
            echo "Avaliação excluida";
        }
        else{
            echo "Problema na exclusão";
        }
    }
?>
<html>
   <a href="../avaliacoes.php">
    <input type="button" value="Voltar"/>
    </a>
</html>