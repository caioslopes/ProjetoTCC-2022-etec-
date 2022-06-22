<?php
include_once('config.php');
include_once('header.php');
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Inicio</title>
    <style>
        .titulo-livros {
            text-align: center;
        }

        img {
            border-radius: 5px;
        }

        .t-bold {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="titulo-livros">
        <h1>Livros</h1>
    </div>

    <?php
    $result = 'SELECT * FROM livros';
    $result = mysqli_query($conn, $result);

    echo '<div class="row row-cols-1 row-cols-md-5 g-4 m-5">';
    while ($livros = mysqli_fetch_assoc($result)) {
        echo "<div class='col'>";
        echo "<div class='card p-1'>";
        echo "<img src='./img/" . $livros['nome_img'] . "' class='card-img-top' alt='Imagem da capa do livro'>";
        echo "<div class='card-body'>";
        echo '<label>' . $livros['titulo'] . '</label>';
        echo "<br>";
        echo '<label>Por: ' . $livros['autor'] . '</label>';
        echo "<br>";
        echo "<a href='paginalivro.php?id=" . $livros['idlivros'] . "' class='btn btn-primary'>Página do Livro</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    echo ' </div>';
    ?>

    <script src="js/bootstrap.bundle.min.js">
    </script>
</body>

</html>