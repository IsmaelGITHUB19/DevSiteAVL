<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h3>Editar Cliente</h3>
    
    <form class="row g-3" method="POST" action="salvar_edit_cliente.php">

        <div class="mb-3">
            <label class="form-label">ID do cliente</label>
            <input type="number" class="form-control" name="id" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" required>
        </div>

        <div class="mb-3">
            <label class="form-label">CPF</label>
           <input type="text" class="form-control" name="cpf" placeholder="000.000.000-00" required>
        </div>

        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email">
        </div>

        <button type="submit" class="btn btn-primary" style="width: 10%;">Salvar</button>
    </form>

</body>
</html>
