<?php

/**
 * 
 * Config for database connection
 * 
 */

$host = "173.249.59.186";
$username = "LucilleMary";
$pass = "CB-d5md2";
$dbname = "bedrijfsuitje";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

?>