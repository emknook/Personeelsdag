# Personeelsdag
 Html/css/php project

For the site to work properly, a rolled out database is necessary.

<?php

$host = "<IP-adress>";
$username = "<username>";
$pass = "password";
$dbname = "database";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

?>