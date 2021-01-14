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

            $activiteit = array(
                "naam" => $_POST['naam'],
                "omschrijving" => $_POST['omschrijving'],
                "locatie" => $_POST['locatie'],
                "begintijd" => $_POST['begintijd'],
                "eindtijd" => $_POST['eindtijd'],
                "deadline" => $_POST['deadline'],
                "aantal" => $_POST['aantal']
            );
    
            $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "activiteit",
                implode(", ", array_keys($activiteit)),
                ":" . implode(", :", array_keys($activiteit))
            );

            $statement = $connection->prepare($sql);
            $statement->execute($activiteit);
        } catch (PDOEXception $error){
            echo $sql . "<br>" .$error->getMessage();
        }
        
    }


?>

<?php if (isset($_POST['submit']) && $statement) { ?>
  <?php echo escape($_POST['naam']);?> toegevoegd.
<?php } ?>
<div class="container">
<ul class="list-group">
  <li class="list-group-item"><a href="/admin.php">Administratiepaneel</a></li>
  <li class="list-group-item"><a href="/view/personeel/read.php">Personeelslijst</a></li>
  <li class="list-group-item"><a href="/view/users/read.php">Gebruikers</a></li>
  <li class="list-group-item"><a href="readAll.php">Overzicht activiteiten</a></li>
</ul>
    <form class="form" method="post">
    <h2>Nieuwe activiteit</h2>
        <div class="form-group">
            <label for="naam">Naam</label>
            <input type="text" class="form-control" name="naam" id="naam">
        </div>
        <div class="form-group">
            <label for="omschrijving">Omschrijving</label>
            <textarea type="textarea" class="form-control" name="omschrijving" id="omschrijving"></textarea>
        </div>
        <div class="form-group">
            <label for="locatie">Locatie</label>
            <input type="text" class="form-control" name="locatie" id="locatie">
        </div>
        <div class="form-group">
            <label for="begintijd">Begintijd</label>
            <input type="time" class="form-control" name="begintijd" id="begintijd">
        </div>
        <div class="form-group">
            <label for="eindtijd">Eindtijd</label>
            <input type="time" class="form-control" name="eindtijd" id="eindtijd">
        </div>
        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="date" class="form-control" name="deadline" id="deadline">
        </div>
        <div class="form-group">
            <label for="aantal">Aantal plekken</label>
            <input type="number" class="form-control" name="aantal" id="aantal">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="submit" value="Submit">
        </div>
    </form>
</div>


<?php include '../../includefiles/footer.php'; ?> 