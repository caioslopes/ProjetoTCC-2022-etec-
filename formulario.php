<?php
include('config.php');
session_start();
/* print_r($_SESSION); */
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header('Location: login.php');
}

// verifica se foi enviado um arquivo
if (isset($_FILES['arquivo']['name']) && $_FILES['arquivo']['error'] == 0) {
  /* echo 'Você enviou o arquivo: <strong>' . $_FILES[ 'arquivo' ][ 'name' ] . '</strong><br />';
  echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ 'arquivo' ][ 'type' ] . ' </strong ><br />';
  echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'arquivo' ][ 'tmp_name' ] . '</strong><br />';
  echo 'Seu tamanho é: <strong>' . $_FILES[ 'arquivo' ][ 'size' ] . '</strong> Bytes<br /><br />'; */

  $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
  $nome = $_FILES['arquivo']['name'];

  // Pega a extensão
  $extensao = pathinfo($nome, PATHINFO_EXTENSION);

  // Converte a extensão para minúsculo
  $extensao = strtolower($extensao);

  // Somente imagens, .jpg;.jpeg;.gif;.png
  // Aqui eu enfileiro as extensões permitidas e separo por ';'
  // Isso serve apenas para eu poder pesquisar dentro desta String
  if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
    // Cria um nome único para esta imagem
    // Evita que duplique as imagens no servidor.
    // Evita nomes com acentos, espaços e caracteres não alfanuméricos
    $novoNome = uniqid(time()) . '.' . $extensao;

    // Concatena a pasta com o nome
    $destino = 'img/' . $novoNome;

    // tenta mover o arquivo para o destino
    if (@move_uploaded_file($arquivo_tmp, $destino)) {
      /* echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
          echo ' < img src = "' . $destino . '" />'; */
    } else
      echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
  } else
    echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
};

if (isset($_POST['submit'])) {

  $titulo = $_POST['titulo'];
  $autor = $_POST['autor'];
  $editora = $_POST['editora'];
  $data_pub = $_POST['data_pub'];
  $paginas = $_POST['paginas'];
  $sinopse = $_POST['sinopse'];
  $nome_img = $novoNome;


  $result = mysqli_query($conn, "INSERT INTO livros (titulo,autor,editora,data_pub,paginas,sinopse, nome_img) VALUES ( '$titulo', '$autor', '$editora', '$data_pub', '$paginas', '$sinopse', '$nome_img')");

  if ($_POST['submit'] == true) {
    print "<script>alert('Enviado com sucesso!')</script>";
  }
}

//if($_FILES):
//$destino = 'img/' . $_FILES['imagem']['name'];
//$arquivo_tmp = $_FILES['imagem']['tmp_name'];

/* $arquivo = $_FILES['imagem']; */

//if (move_uploaded_file($arquivo_tmp, $destino)){
/* echo 'Imagem Enviada com sucesso'; */
//}else {
/* echo 'Erro ao enviar imagem'; */
//}
//endif;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <title>Sistema</title>
</head>

<body>
  <nav class="navbar bg-light">
    <div class="container-fluid">
      <div>
        <a href="formulario.php" class="btn btn-primary">Cadastrar livro</a>
      </div>
      <div>
        <a href="livroscadastrados.php" class="btn btn-warning">Livros cadastrados</a>
      </div>
      <div>
        <a href="sair.php" class="btn btn-danger me-2">Sair</a>
      </div>
    </div>
  </nav>

  <!-- Formulário de cadastro dos livros -->
  <form action="formulario.php" method="POST" enctype="multipart/form-data" class="container mt-5">
    <div class="form-group">
      <label for="imagem" class="form-label">Imagem do livro</label>
      <input class="form-control" type="file" name="arquivo" id="arquivo" required>
    </div>
    <div class="form-group">
      <label for="titulo">Titulo do livro</label>
      <input type="text" name="titulo" class="form-control" id="titulo" required>
    </div>
    <div class="form-group">
      <label for="autor">Autor</label>
      <input type="text" name="autor" class="form-control" id="autor" required>
    </div>
    <div class="form-group">
      <label for="editora">Editora</label>
      <input type="text" name="editora" class="form-control" id="editora" required>
    </div>
    <div class="form-group">
      <label for="data">Data da publicação</label>
      <input type="date" name="data_pub" class="form-control" id="data_pub" required>
    </div>
    <div class="form-group">
      <label for="paginas">Páginas</label>
      <input type="text" name="paginas" class="form-control" id="paginas" required>
    </div>
    <div class="mb-3">
      <label for="sinopse" class="form-label">Sinopse</label>
      <textarea class="form-control" name="sinopse" id="sinopse" rows="3" required></textarea>
    </div>
    <input type="submit" name="submit" class="btn btn-primary">
  </form>
</body>

<script>
  document.getElementById("arquivo").onchange = function(e) {
    if (e.target.files != null && e.target.files.length != 0) {
      var arquivo = e.target.files[0];
      var fd = new FormData();
      fd.append("arquivo", arquivo);
      var xmlhttp = new XMLHttpRequest();
      xmlhttp;
      onreadystatechange = function() {
        if (xmlhttp.readyState === 4 & xmlhttp.status === 200)
          alert(xmlhttp.responseText);
      };
      xmlhttp.open("POST", "index.php", true);
      xmlhttp.send(fd);
    }
  };
</script>

</html>