<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos (CRUD)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        .area-produtos {
            display: flex;
            flex-wrap: wrap; 
            gap: 20px;     
            justify-content: center;
            padding: 20px;
        }
        .card {
            width: 300px;
        }
        .img-ajustada {
            object-fit: contain;
            max-height: 400px;
            width: 90%; 
            display: block;
            margin: 10px auto; 
        }
        .botoes-crud {
            display: flex;
            justify-content: space-between; /* Espaçamento entre os botões */
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <h1 style="text-align: center; margin-top: 30px;">Histórico de vendas</h1>

    <div class="text-center mb-4">
        <a href="adicionar_venda.php" class="btn btn-success btn-lg">
            Vender
        </a>
        <a href="../painel.html" class="btn btn-success btn-lg">
            Voltar
        </a>
    </div>

    <?php
    // --- 1. CONEXÃO E CONFIGURAÇÃO ---
    $conn = new mysqli("localhost", "root", "", "sitedb");
    
    if ($conn->connect_error) {
        die("Erro interno. Tente novamente mais tarde."); 
    }

 $sql = "SELECT 
    v.ID AS VENDA_ID,
    v.PAGAMENTO,
    p.DESCRICAO AS PRODUTO_DESCRICAO,
    p.CODIGO AS PRODUTO_CODIGO,
    p.VALOR AS PRODUTO_VALOR,
    c.NOME AS CLIENTE_NOME,
    c.ID AS CLIENTE_ID
FROM VENDA v
JOIN PRODUTO p ON v.PRODUTO_CODIGO = p.CODIGO
JOIN CLIENTE c ON v.CLIENTE_ID = c.ID"; // sem ; aqui

$resultado = $conn->query($sql);

if (!$resultado) {
    die("Erro na query: " . $conn->error);
}

echo '<ul class="list-group">';

if ($resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
        echo '<li class="list-group-item">';
        echo "Venda ID: " . $linha['VENDA_ID'] . 
             " | Pagamento: " . $linha['PAGAMENTO'] .
             " | Produto: " . $linha['PRODUTO_DESCRICAO'] . " (Código: " . $linha['PRODUTO_CODIGO'] . ", Valor: " . $linha['PRODUTO_VALOR'] . ")" .
             " | Cliente: " . $linha['CLIENTE_NOME'] . " (ID: " . $linha['CLIENTE_ID'] . ")";
           // Formulário de edição
        echo '<form method="POST" action="Editar/editar_venda.php" style="display:inline;">';
        echo '<input type="hidden" name="venda_id" value="' . $linha['VENDA_ID'] . '">';
        echo '<input type="submit" value="Editar" class="btn btn-primary btn-sm">';
        echo '</form>';

        // Formulário de exclusão
        echo '<form method="POST" action="Delete/delete_banco_venda.php" style="display:inline;">';
        echo '<input type="hidden" name="venda_id" value="' . $linha['VENDA_ID'] . '">';
        echo '<input type="submit" value="Excluir" class="btn btn-danger btn-sm">';
        echo '</form>';

        echo '</li>';

    }
} else {
    echo '<li class="list-group-item">Nenhuma venda encontrada.</li>';
}

echo '</ul>';


$conn->close();

    ?>

</body>
</html>