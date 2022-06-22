<?php

if (!empty($_GET['id'])) {
    include_once('config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT *  FROM livros WHERE idlivros=$id";

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM livros WHERE idlivros=$id";
        $resultDelete = $conn->query($sqlDelete);
    }
}
header('Location: livroscadastrados.php');
