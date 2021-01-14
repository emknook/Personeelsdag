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

            $persoon = array(
                "voorletters" => $_POST['voorletters'],
                "tussenvoegsel" => $_POST['tussenvoegsel'],
                "achternaam" => $_POST['achternaam'],
                "voucher" => $_POST['voucher'],
                "email" => $_POST['email']
            );
    
            $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "personeel",
                implode(", ", array_keys($persoon)),
                ":" . implode(", :", array_keys($persoon))
            );

            $statement = $connection->prepare($sql);
            $statement->execute($persoon);
        } catch (PDOEXception $error){
            echo $sql . "<br>" .$error->getMessage();
        }
        
    }


?>

<?php if (isset($_POST['submit']) && $statement) { ?>
  <?php    echo('<div class="alert alert-success" role="alert">' . $persoon['voorletters'] . ' '. $persoon['tussenvoegsel'] .' '. $persoon['achternaam']. ' is toegevoegd </div>');?>
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
            <label for="voorletters">Voorletters</label>
            <input type="text" class="form-control" name="voorletters" id="voorletters">
        </div>
        <div class="form-group">
            <label for="tussenvoegsel">Tussenvoegsel</label>
            <input type="text" class="form-control" name="tussenvoegsel" id="tussenvoegsel">
        </div>
        <div class="form-group">
            <label for="achternaam">Achternaam</label>
            <input type="text" class="form-control" name="achternaam" id="achternaam">
        </div>
        <div class="form-group">
            <label for="voucher">Voucher</label>
            <input type="text" class="form-control" name="voucher" id="voucher">
        </div>
        <div class="form-group">
            <label for="email">Email Adres</label>
            <input type="text"  class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="submit" value="Submit">
        </div>
    </form>
</div>


<?php include '../../includefiles/footer.php'; ?> 