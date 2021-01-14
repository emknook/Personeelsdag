<?php
require "../../includefiles/config.php";
require "../../includefiles/common.php";
if(!isset($_GET['id']) || empty($_GET['id'])){
    header('location: /view/personeel/read.php');
}
$id = intval($_GET['id']);
if($id == 0){
    header('location: /view/personeel/read.php');
}
try{
    $connection = new PDO($dsn, $username, $pass, $options);

    $sql = "DELETE FROM personeel WHERE personeel.idpersoneel = :id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();
    header('location: /view/personeel/read.php');
} catch (PDOEXception $error){
    echo $sql . "<br>" .$error->getMessage();
}

?>