<?php
// require_once("../__inc/note/comptoiredb.class.php");
if(is_dir('./__inc')){
    include '__inc/note/comptoirdb.class.php';
}
elseif(is_dir('./../__inc')){
    include '../__inc/note/comptoirdb.class.php';
}
elseif(is_dir('./../../__inc')){
    include '../../__inc/note/comptoirdb.class.php';
}
else{
    include '../../note/comptoirdb.class.php';

}
$bdd = new comptoirDb();
$bdd->connect();
$lastInsertId="";
// $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
function query($value){
    $bdd = new comptoirDb();
    $bdd->connect();

    $bdd->execute($value);
}
function prepare($requete,$values){
    $bdd = new comptoirDb();
    $bdd->connect();
    $res=$bdd->prepare($requete,$values);
    if(is_array($res)){
        $GLOBALS['lastInsertId']=$res[1];
        return $res[0];
    }
    else{
        return null;
    }
}
// function db_connect()
// {
//     $dsn = 'mysql:host=localhost;dbname=comptoirdu_mysql;port=3306;charset=utf8';

//     try{
//         $pdo = new PDO($dsn, 'root' , 'root');
//         return $pdo;
//     }
//     catch (PDOException $exception) {

//         exit('Erreur de connexion à la base de données');
//     }

// }
function getOne($value){
    $bdd = new comptoirDb();
    $bdd->connect();
    return $bdd->getOne($value);
}
function getAll($value){
    $bdd = new comptoirDb();
    $bdd->connect();
    return $bdd->getAll($value);
}
function fetch_assoc($query){
    $bdd = new comptoirDb();
    $bdd->connect();
        return $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
}
function insertId(){
    return $GLOBALS['lastInsertId'];
}
function fetch($query){
    $bdd = new comptoirDb();
    $bdd->connect();
    return $query->fetch(PDO::FETCH_ASSOC);
    $query->closeCursor();
}
?>
