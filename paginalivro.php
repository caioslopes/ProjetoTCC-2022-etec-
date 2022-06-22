<?php
include_once('config.php');
include_once('header.php');

if (!empty($_GET['id'])) {

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM livros WHERE idlivros=$id";

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($datas = mysqli_fetch_assoc($result)) {

            $titulo = $datas['titulo'];
            $autor = $datas['autor'];
            $editora = $datas['editora'];
            $data_pub = $datas['data_pub'];
            $paginas = $datas['paginas'];
            $sinopse = $datas['sinopse'];
            $nome_img = $datas['nome_img'];
        }
    } else {
    }
} else {
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title><?php echo $titulo ?></title>
    <style>
        /*IMAGENS*/
        img {
            width: 100%;
            height: 100%;
            display: block;
        }

        img {
            width: 230px;
            height: 300px;
            padding: 30px;
        }

        /*IMAGENS*/
        .content-book {
            max-width: 980px;
            margin: 0 auto;
            width: 100%;
            background: #e2e2e2;
        }

        .content-book-img {
            display: table;
        }

        .imagem {
            display: table-cell;
            float: left;
        }

        .text {
            display: table-cell;
            float: left;
            width: 600px;
            padding: 30px;
        }

        @media (max-width: 600px) {
            .text {
                display: table-cell;
                float: left;
                width: auto;
                padding: 30px;
            }
        }
    </style>
</head>

<body>
    <section class="content-book">
        <main class="content-book-img">
            <div class="imagem">
                <img src="./img/<?php echo $nome_img ?>" alt="">
            </div>

            <div class="text">
                <p><b>Titulo:</b> <?php echo $titulo ?></p>
                <p><b>Autor:</b> <?php echo $autor ?></p>
                <p><b>Editora:</b> <?php echo $editora ?></p>
                <p><b>Data da publicação:</b> <?php echo $data_pub ?></p>
                <p><b>Páginas:</b> <?php echo $paginas ?></p>
                <p><b>Sinopse:</b> <?php echo $sinopse ?></p>
            </div>
        </main>
    </section>


    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>