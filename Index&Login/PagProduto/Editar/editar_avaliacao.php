<!DOCTYPE html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Avaliação</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h3>Editar Avaliação</h3>
    
    <form class="row g-3" method="POST" action="salvar_edit_avaliacao.php">

        <div class="mb-3">
            <label class="form-label">ID da Avaliação</label>
            <input type="number" class="form-control" name="id" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nota</label>
            <input type="number" class="form-control" name="nota" min="0" max="10" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Opinião</label>
            <input type="text" class="form-control" name="opn" maxlength="100" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nome do Cliente</label>
            <input type="text" class="form-control" name="nome_cliente" maxlength="50">
        </div>

        <div class="mb-3">
            <label class="form-label">ID do Cliente</label>
            <input type="number" class="form-control" name="id_cliente" required>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 10%;">Salvar</button>
    </form>

</body>
</html>
