<?php 
include '../../includefiles/header.php';
require "../../includefiles/config.php";
require "../../includefiles/common.php";

    if(!isset($_SESSION['username'])){
        header('Location: /index.php');
    } 
    if (isset($_POST['submit'])){
        try {
            $connection = new PDO($dsn, $username, $pass, $options);

            $user = array(
                "username" => $_POST['username'],
                "password" => password_hash($_POST['password'], PASSWORD_DEFAULT)
            );
    
            $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "users",
                implode(", ", array_keys($user)),
                ":" . implode(", :", array_keys($user))
            );

            $statement = $connection->prepare($sql);
            $statement->execute($user);
        } catch (PDOEXception $error){
            echo $sql . "<br>" .$error->getMessage();
        }
        
    }


?>

<?php if (isset($_POST['submit']) && $statement) { ?>
  <?php    echo('<div class="alert alert-success" role="alert">Gebruiker '.$_POST['username'].' is toegevoegd </div>');?>
<?php } ?>
<div class="container">
<ul class="list-group">
  <li class="list-group-item"><a href="/admin.php">Administratiepaneel</a></li>
  <li class="list-group-item"><a href="/view/activiteit/readAll.php">Activiteiten</a></li>
  <li class="list-group-item"><a href="/view/users/read.php">Gebruikers</a></li>
  <li class="list-group-item"><a href="read.php">Overzicht personeel</a></li>
</ul>
    <form class="form" method="post">
    <h2>Nieuw personeel</h2>
        <div class="form-group">
            <label for="username">Gebruikersnaam</label>
            <input type="text" class="form-control" name="username" id="username">
        </div>
        <div class="form-group">
            <label for="password">Wachtwoord</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="submit" value="Submit">
        </div>
    </form>
</div>


<?php include '../../includefiles/footer.php'; ?> 