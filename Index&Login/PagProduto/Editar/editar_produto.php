<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
 <form class="row g-3" method="Post" action= "salvar_edit.php">
  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Digite o código já cadastrado</label>
  <input type="number" name="codigo" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Altere a Descrição</label>
  <textarea class="form-control" name = "descricao" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Altere o Valor</label>
   <input type="number" class="form-control" name="valor" id="exampleFormControlInput1">
</div>
    <button type="submit" style= "width: 10%;" class="btn btn-primary">Primary</button>
</form>
</body>
</html>