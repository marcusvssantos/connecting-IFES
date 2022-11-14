<?php
include("header.php");
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