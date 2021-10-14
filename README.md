# Personeelsdag
 Html/css/php project

For the site to work properly, a rolled out database is necessary.

A file named config.php should be added in the includefiles folder;

$host = "pass";
$username = "user";
$pass = "password";
$dbname = "database";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

