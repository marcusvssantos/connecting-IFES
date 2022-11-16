<?php
include("header.php");

if (isset($_POST['publicar'])) {
    if ($_FILES["file"]["error"] > 0) {
        $texto = $_POST["texto"];
        $hoje = date("Y-m-d");

        if ($texto == "") {
            echo "<h3>O Texto não Pode Ficar em Branco na Publicação!</h3>";
        } else {
            $query = "INSERT INTO publicacao ('usuario','texto','data') VALUES ('$login_cookie', '$texto', '$hoje')";
            $data = $pdo->prepare($query) or die();
            if ($data) {
                header("Location: ./");
            } else {
                echo "Ocorreu um erro, tente novamente mais tarde!";
            }
        }
    } else {
        $n = rand(0, 1000000); // Gera um número entre 0 e 1000000.
        $img = $n . $_FILES["file"]["name"]; // Consulta 01
        move_uploaded_file($_FILES["file"]["tm_name"], "upload/" . $img);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div id="publicacao">
        <forms method="POST" enctype="multipart/form-data">
            </br>
            <textarea placeholder="Escreva uma Nova Publicação"></textarea>
            <label for="file-input">
                <img src="img/addfoto.svg" title="Inserir Foto" />
            </label>
            <input type="submit" value="Publicar" name="publicar" />

            <input type="file" id="file-input" name="file" hidden />
        </forms>
    </div>
</body>

</html>