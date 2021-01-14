<?php
include "../../includefiles/header.php";
require "../../includefiles/config.php";
require "../../includefiles/common.php";
if (isset($_POST['submit'])) {
  try {
    $connection = new PDO($dsn, $username, $pass, $options);
    $activiteit =[
      "id"        => $_GET['id'],
      "naam" => $_POST['naam'],
      "omschrijving"  => $_POST['omschrijving'],
      "locatie"     => $_POST['locatie'],
      "eindtijd"       => $_POST['eindtijd'],
      "begintijd"  => $_POST['begintijd'],
      "deadline"      => $_POST['deadline'],
      "aantal"      => $_POST['aantal']
    ];

    $sql = "UPDATE activiteit
            SET idactiviteit = :id,
              naam = :naam,
              omschrijving = :omschrijving,
              locatie = :locatie,
              eindtijd = :eindtijd,
              deadline = :deadline,
              begintijd = :begintijd,
              aantal = :aantal
            WHERE idactiviteit = :id";
    $statement = $connection->prepare($sql);
    $statement->execute($activiteit);
    echo('<div class="alert alert-success" role="alert">' . $_POST['naam']. ' is geupdate </div>');

  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}

if (isset($_GET['id'])) {
  try {
    $connection = new PDO($dsn, $username, $pass, $options);
    $id = $_GET['id'];
    $sql = "SELECT * FROM activiteit WHERE idactiviteit = :id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $activiteit = $statement->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
} else {
    echo "Something went wrong!";
    exit;
}
?>
<div class="container">
    <div class="row justify-content-center">
    <h2>Activiteit aanpassen; <?php echo $activiteit['naam']?></h2>
        <form class="form" method="post">
            <div class="form-group">
                <label for="naam">Naam</label>
                <input type="text" class="form-control" name="naam" id="naam" value="<?php echo $activiteit['naam']?>" >
            </div>
            <div class="form-group">
                <label for="omschrijving">Omschrijving</label>
                <textarea rows="8" class="form-control" cols="70" type="text" name="omschrijving" id="omschrijving"><?php echo $activiteit['omschrijving']?></textarea>
            </div>
            <div class="form-group">
                <label for="locatie">Locatie</label>
                <input type="text" class="form-control" name="locatie" id="locatie" value="<?php echo $activiteit['locatie']?>" >
            </div>
            <div class="form-group">
                <label for="begintijd">Begintijd</label>
                <input type="time" class="form-control" name="begintijd" id="begintijd" value="<?php echo $activiteit['begintijd']?>" >
            </div>
            <div class="form-group">
                <label for="eindtijd">Eindtijd</label>
                <input type="time" class="form-control" name="eindtijd" id="eindtijd" value="<?php echo $activiteit['eindtijd']?>" >
            </div>
            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="date" class="form-control" name="deadline" id="deadline" value="<?php echo $activiteit['deadline']?>" >
            </div>
            <div class="form-group">
                <label for="aantal">Aantal plekken</label>
                <input type="number" class="form-control" name="aantal" id="aantal" value="<?php echo $activiteit['aantal']?>" >
            </div>
            <input class="btn btn-primary" type="submit" name="submit" value="submit">
        </form>
    </div>
</div>

<li class="list-group-item">
    <a href="/view/inschrijving/read.php?id=<?php echo $_GET['id']?>" >.Inschrijvingen</a>
</li>
<?php include "../../includefiles/footer.php"; ?>