<?php
require "../../includefiles/config.php";
require "../../includefiles/common.php";
if(!isset($_GET['id']) || empty($_GET['id'])){
    header('location: /view/users/read.php');
}
try{
    $connection = new PDO($dsn, $username, $pass, $options);

    $sql = "DELETE FROM users WHERE users.username = :id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $_GET['id']);
    $statement->execute();
    header('location: /view/users/read.php');
} catch (PDOEXception $error){
    echo $sql . "<br>" .$error->getMessage();
}

?>