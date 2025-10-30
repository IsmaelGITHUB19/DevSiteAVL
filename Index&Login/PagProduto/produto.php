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

    <h1 style="text-align: center; margin-top: 30px;">Nossos Livros de Filosofia</h1>

    <div class="text-center mb-4">
        <a href="adicionar_produto.html" class="btn btn-success btn-lg">
            Adicionar Novo Produto
        </a>
        <a href="" class="btn btn-success btn-lg">
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

    $sql = "SELECT CODIGO, DESCRICAO, VALOR FROM PRODUTO ORDER BY DESCRICAO";
    $resultado = $conn->query($sql);

  echo '<ul class="list-group">';

// 2. Você inicia o loop para ler cada linha e exibir:
if ( $resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
   echo '<li class="list-group-item">';
        echo "Código: " . $linha['CODIGO'] . 
             " | Descrição: " . $linha['DESCRICAO'] . 
             " | Valor: " . $linha['VALOR'];

        // Formulário de edição
        echo '<form method="POST" action="Editar/editar_produto.php" style="display:inline;">';
        echo '<input type="hidden" name="codigo" value="' . $linha['CODIGO'] . '">';
        echo '<input type="submit" value="Editar" class="btn btn-primary btn-sm">';
        echo '</form>';

        // Formulário de exclusão
        echo '<form method="POST" action="Delete/delete_banco.php" style="display:inline;">';
        echo '<input type="hidden" name="codigo" value="' . $linha['CODIGO'] . '">';
        echo '<input type="submit" value="Excluir" class="btn btn-danger btn-sm">';
        echo '</form>';

        echo '</li>';
    }
} else {
    echo '<li class="list-group-item">Nenhum funcionário encontrado.</li>';
}


// FECHA A TAG </ul> FORA DO LOOP
echo '</ul>';

$conn->close();

    ?>

</body>
</html>