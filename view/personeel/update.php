<?php
include "../../includefiles/header.php";
require "../../includefiles/config.php";
require "../../includefiles/common.php";
if (isset($_POST['submit'])) {
  try {
    $connection = new PDO($dsn, $username, $pass, $options);
    $persoon =[
      "id"        => $_GET['id'],
      "voorletters" => $_POST['voorletters'],
      "tussenvoegsel"  => $_POST['tussenvoegsel'],
      "achternaam"     => $_POST['achternaam'],
      "email"       => $_POST['email'],
      "voucher"      => $_POST['voucher']
    ];

    $sql = "UPDATE personeel
            SET idpersoneel = :id,
              voorletters = :voorletters,
              tussenvoegsel = :tussenvoegsel,
              achternaam = :achternaam,
              email = :email,
              voucher = :voucher
            WHERE idpersoneel = :id";
    $statement = $connection->prepare($sql);
    $statement->execute($persoon);
    echo('<div class="alert alert-success" role="alert">' . $persoon['voorletters'] . ' '. $persoon['tussenvoegsel'] .' '. $persoon['achternaam']. ' is geupdate </div>');

  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}

if (isset($_GET['id'])) {
  try {
    $connection = new PDO($dsn, $username, $pass, $options);
    $id = $_GET['id'];
    $sql = "SELECT * FROM personeel WHERE idpersoneel = :id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $persoon = $statement->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
} else {
    echo "Something went wrong!";
    exit;
}
?>

<div class="container">   
  <ul c[lass="list-group">
    <li class="list-group-item"><a href="/admin.php">Administratiepaneel</a></li>
    <li class="list-group-item"><a href="/view/activiteit/readAll.php">Activiteiten</a></li>
    <li class="list-group-item"><a href="/view/users/read.php">Gebruikers</a></li>
    <li class="list-group-item"><a href="create.php">Nieuw personeel</a></li>
  </ul>
  <h2>Personeel aanpassen; <?php echo ($persoon['voorletters'] . ' '. $persoon['tussenvoegsel'] .' '. $persoon['achternaam']) ?></h2>
    <form class="form" method="post">
        <div class="form-group">
            <label for="voorletters">Voorletters</label>
            <input type="text" class="form-control" name="voorletters" id="voorletters" value="<?php echo $persoon['voorletters']?>" >
        </div>
        <div class="form-group">
            <label for="tusenvoegsel">Tussenvoegsel</label>
            <input type="text" class="form-control"  name="tusenvoegsel" id="tusenvoegsel" value="<?php echo $persoon['tussenvoegsel']?>" >
        </div>
        <div class="form-group">
            <label for="achternaam">Achternaam</label>
            <input type="text" class="form-control" name="achternaam" id="achternaam" value="<?php echo $persoon['achternaam']?>" >
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo $persoon['email']?>" >
        </div>
        <div class="form-group">
            <label for="voucher">Voucher</label>
            <input type="text" class="form-control" name="voucher" id="voucher" value="<?php echo $persoon['voucher']?>" >
        </div>
        <input class="btn btn-primary" type="submit" name="submit" value="submit">
    </form>
</div>
<?php include "../../includefiles/footer.php"; ?>