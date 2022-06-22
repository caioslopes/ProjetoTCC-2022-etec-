<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Pagina Administrativa</title>
</head>
<body>
    <?php 
    include_once('header.php');
    ?>
    <div>
        <h1>Acesso</h1>
        <form action="funcaologin.php" method="post">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="senha" placeholder="Senha">
            <input type="submit" name="submit" value="Acessar">
        </form>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>