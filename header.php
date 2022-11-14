<?php
include("conexao.php");


$login_cookie = $_COOKIE['login'];
if (!isset($login_cookie)) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css" />
    <style>
        body {
            background: #F6F6F6;
        }
    </style>
</head>

<body>
    <div id="topo">
        <a href="#"><img src="img/logoIFES.svg" width="90" name="logo"></a>
        <form method="GET">
            <input type="text" placeholder="Pesquisar Usuário" name="pesquisa" autocomplete="off"><input type="submit" hidden>
        </form>
        <a href="#"><img src="img/chat.svg" width="20" name="menu"></a>
        <a href="#"><img src="img/perfil.svg" width="20" name="menu"></a>
    </div>
</body>

</html>