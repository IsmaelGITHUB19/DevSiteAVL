<?php
// Conexão com o banco
$conn = new mysqli("localhost", "root", "", "sitedb");
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Buscar clientes
$sql_clientes = "SELECT ID, NOME FROM CLIENTE";
$result_clientes = $conn->query($sql_clientes);

// Buscar produtos
$sql_produtos = "SELECT CODIGO, DESCRICAO FROM PRODUTO";
$result_produtos = $conn->query($sql_produtos);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Venda</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
  <style>
    body {
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f8f9fa;
    }
    .card {
      width: 400px;
      max-height: 90vh;
      overflow-y: auto;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

<div class="card">
  <h3 class="text-center mb-4">Alterar venda via ID</h3>
  <form action="salvar_edit_venda.php" method="post">
    <input type="hidden" name="venda_id" value="<?php echo $_POST['venda_id']; ?>">

    <div class="form-group">
      <label>Pagamento</label>
      <select class="form-control" name="pagamento" required>
        <option value="">Selecione</option>
        <option value="Pix">Pix</option>
        <option value="Crédito">Crédito</option>
        <option value="Débito">Débito</option>
        <option value="Dinheiro">Dinheiro</option>
      </select>
    </div>

    <div class="form-group">
      <label>Cliente</label>
      <select class="form-control" name="cliente_id" required>
        <option value="">Selecione</option>
        <?php
        if ($result_clientes->num_rows > 0) {
            while($cliente = $result_clientes->fetch_assoc()) {
                echo '<option value="' . $cliente['ID'] . '">' . $cliente['NOME'] . '</option>';
            }
        }
        ?>
      </select>
    </div>

    <div class="form-group">
      <label>Produto</label>
      <select class="form-control" name="produto_codigo" required>
        <option value="">Selecione</option>
        <?php
        if ($result_produtos->num_rows > 0) {
            while($produto = $result_produtos->fetch_assoc()) {
                echo '<option value="' . $produto['CODIGO'] . '">' . $produto['DESCRICAO'] . '</option>';
            }
        }
        ?>
      </select>
    </div>

    <button type="submit" class="btn btn-primary btn-block">Salvar Edição</button>
  </form>
</div>

</body>
</html>
