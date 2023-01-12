<?php

$dsn = 'mysql:host=localhost;dbname=entraxe;port=3306;charset=utf8';

try{
    $pdo = new PDO($dsn, 'root' , 'root');
}
catch (PDOException $exception) {

    exit('Erreur de connexion à la base de données');
}

?>
