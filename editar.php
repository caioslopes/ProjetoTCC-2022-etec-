<?php
include('config.php');
session_start();

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header('Location: login.php');
}


if (!empty($_GET['id'])) {

  $id = $_GET['id'];

  $sqlSelect = "SELECT * FROM livros WHERE idlivros=$id";

  $result = $conn->query($sqlSelect);

  if ($result->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($result)) {

      $titulo = $user_data['titulo'];
      $autor = $user_data['autor'];
      $editora = $user_data['editora'];
      $data_pub = $user_data['data_pub'];
      $paginas = $user_data['paginas'];
      $sinopse = $user_data['sinopse'];
    }
  } else {
    header('Location: livroscadastrados.php');
  }
} else {
  header('Location: livroscadastrados.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <title>Editar livro</title>
</head>

<body>
  <nav class="navbar bg-light">
    <div class="container-fluid">
      <div>
        <a href="formulario.php" class="btn btn-primary">Novo livro</a>
      </div>
      <div>
        <a href="livroscadastrados.php" class="btn btn-warning">Livros cadastrados</a>
      </div>
      <div>
        <a href="sair.php" class="btn btn-danger me-2">Sair</a>
      </div>
    </div>
  </nav>


  <form action="salvaredicao.php" method="POST" class="container mt-5">
    <div class="form-group">
      <label for="titulo">Titulo do livro</label>
      <input type="text" name="titulo" class="form-control" id="titulo" value="<?php echo $titulo ?>">
    </div>
    <div class="form-group">
      <label for="autor">Autor</label>
      <input type="text" name="autor" class="form-control" id="autor" value="<?php echo $autor ?>">
    </div>
    <div class="form-group">
      <label for="editora">Editora</label>
      <input type="text" name="editora" class="form-control" id="editora" value="<?php echo $editora ?>">
    </div>
    <div class="form-group">
      <label for="data">Data da publicação</label>
      <input type="date" name="data_pub" class="form-control" id="data_pub" value="<?php echo $data_pub ?>">
    </div>
    <div class="form-group">
      <label for="paginas">Páginas</label>
      <input type="text" name="paginas" class="form-control" id="paginas" value="<?php echo $paginas ?>">
    </div>
    <div class="mb-3">
      <label for="sinopse" class="form-label">Sinopse</label>
      <textarea class="form-control" name="sinopse" id="sinopse" rows="3"><?php echo $sinopse ?></textarea>
    </div>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input type="submit" name="update" id="update" class="btn btn-primary">
  </form>
</body>

</html>