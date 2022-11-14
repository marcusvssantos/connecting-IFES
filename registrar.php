<?php
include("conexao.php");

if (isset($_POST['entrar'])) {
    try {
        $verifica = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $verifica->execute(array($_POST['email']));
        $verificando = $verifica->rowCount();

        if ($verificando >= 1) {
            echo "<h3>Este Email já está registrado!</h3>";
        } elseif ($_POST['nome'] == '' or strlen($_POST['nome']) < 3) {
            echo "<h3>Nome Inválido!</h3>";
        } elseif ($_POST['apelido'] == '') {
            echo "<h3>Apelido Inválido!</h3>";
        } elseif ($_POST['email'] == '' or strlen($_POST['email']) < 3) {
            echo "<h3>Email Inválido!</h3>";
        } elseif ($_POST['senha'] == '' or strlen($_POST['senha']) < 3) {
            echo "<h3>Senha Inválida!</h3>";
        } else {
            $sql = $pdo->prepare("INSERT INTO usuarios VALUES (null,?,?,?,?,?)");
            $sql->execute(array($_POST['nome'], $_POST['apelido'], $_POST['email'], $_POST['senha'], $_POST['data']));
            setcookie('login', $_POST['email']);
            header("location: ./");
        }
    } catch (PDOException $erro) {
        echo $erro->getMessage();
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Connecting IFES</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <style type="text/css">
        img {
            display: block;
            margin: auto;
            margin-top: 2rem;
            width: 20rem;
        }

        form {
            text-align: center;
            margin-top: 2rem;
        }

        input[type="email"],
        [type="password"],
        [type="text"],
        [type="date"] {
            border: .1rem solid #CCC;
            width: 25rem;
            height: 2.5rem;
            padding-left: 1rem;
            border-radius: .3rem;
            margin-top: 1rem;
        }

        input[type="submit"] {
            border: none;
            width: 8rem;
            height: 2.5rem;
            border-radius: .3rem;
            margin-top: 2rem;
        }

        input[type="submit"]:hover {
            background-color: #33ff00;
            color: cornsilk;
            cursor: pointer;
        }

        h2,
        h3 {
            text-align: center;
            margin-top: 2rem;
        }
    </style>
</head>

<body>
    <img src="img/logoIFES.svg">
    <h2> Registro </h2>
    <form method="POST">
        <input type="text" placeholder="Nome" name="nome"><br />
        <input type="text" placeholder="Apelido" name="apelido"><br />
        <input type="email" placeholder="Endereço Email" name="email"><br />
        <input type="password" placeholder="Palavra-Passe" name="senha"><br />
        <input type="date" name="data" value="2014-02-09"><br />
        <input type="submit" value="Criar Conta" name="entrar">
    </form>
    <h3>Já Possui uma Conta? <a href="login.php">Logar</a></h3>
</body>

</html>