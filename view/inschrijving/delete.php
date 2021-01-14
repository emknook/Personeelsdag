<?php
require "../../includefiles/config.php";
require "../../includefiles/common.php";
if(!isset($_GET['idpersoneel']) || empty($_GET['idpersoneel']) ){
    header('location: /view/inschrijving/read.php?id='. $_GET['idactiviteit']);
}
try{
    $connection = new PDO($dsn, $username, $pass, $options);

    $sql = "DELETE FROM inschrijving WHERE personeelid = :idpersoneel AND activiteitid = :idactiviteit";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':idpersoneel', $_GET['idpersoneel']);
    $statement->bindValue(':idactiviteit', $_GET['idactiviteit']);
    $statement->execute();
    header('location: /view/inschrijving/read.php?id='. $_GET['idactiviteit']);
} catch (PDOEXception $error){
    echo $sql . "<br>" .$error->getMessage();
}

?>