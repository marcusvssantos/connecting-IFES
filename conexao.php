<?php

$pdo = new PDO('mysql:host=localhost;dbname=connecting-ifes', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
