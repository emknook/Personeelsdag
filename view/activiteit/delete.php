<?php
require "../../includefiles/config.php";
require "../../includefiles/common.php";
if(!isset($_GET['id']) || empty($_GET['id'])){
    header('location: /view/activiteit/read.php');
}
$id = intval($_GET['id']);
if($id == 0){
    header('location: /view/activiteit/read.php');
}
try{
    $connection = new PDO($dsn, $username, $pass, $options);

    $sql = "DELETE FROM activiteit WHERE activiteit.idactiviteit = :id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();
    header('location: /view/activiteit/readAll.php');
} catch (PDOEXception $error){
    echo $sql . "<br>" .$error->getMessage();
}

?>