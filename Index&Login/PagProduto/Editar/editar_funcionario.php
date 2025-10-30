<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
 <form class="row g-3" method="Post" action= "salvar_edit_funcionario.php">
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Altere o nome</label>
    <input type="text" class="form-control" name="nome" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Altere o cpf </label>
   <input type="number" class="form-control" name="cpf" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Altere o email </label>
   <input type="email" class="form-control" name="email" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Altere o cargo </label>
   <input type="text" class="form-control" name="cargo" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Altere o endereço </label>
   <input type="text" class="form-control" name="endereco" id="exampleFormControlInput1">
</div>
    <button type="submit" style= "width: 10%;" class="btn btn-primary">Primary</button>
</form>
</body>
</html>