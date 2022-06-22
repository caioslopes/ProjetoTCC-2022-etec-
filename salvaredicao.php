<?php

    include_once('config.php');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $editora = $_POST['editora'];
        $data_pub = $_POST['data_pub'];
        $paginas = $_POST['paginas'];
        $sinopse = $_POST['sinopse'];

        $sqlUpdate = "UPDATE livros SET titulo='$titulo', autor='$autor', editora='$editora', data_pub='$data_pub', paginas='$paginas', sinopse='$sinopse'  WHERE idlivros='$id'";

        $result = $conn->query($sqlUpdate);
    }
    header('Location: livroscadastrados.php');


?>