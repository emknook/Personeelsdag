<?php $title = "Inschrijven"?>
<?php include '../../includefiles/header.php'; ?> 

<div class="container">
<?php

    require "../../includefiles/config.php";
    require "../../includefiles/common.php";

    if (isset($_POST['submit'])){        

        try {
            $connection = new PDO($dsn, $username, $pass, $options);
                
            $sql = "INSERT INTO inschrijving (personeelid, activiteitid) values ( " . $_POST['personeelid'] . "," .$_POST['id'] . ")";

            $statement = $connection->prepare($sql);
            $statement->execute();
        }catch (PDOEXception $error){
            echo $sql . "<br>" .$error->getMessage();
        }
        
    }

    if (isset($_GET['id']) ) {
      try {
        $connection = new PDO($dsn, $username, $pass, $options);
        $id = $_GET['id'];
        $sql = "SELECT * FROM activiteit WHERE activiteit.idactiviteit = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
    
        $activiteit = $statement->fetch();

        $sql2 = "SELECT CONCAT( p.voorletters,' ', p.tussenvoegsel,' ', p.achternaam) AS personeelsnaam, p.idpersoneel
        FROM personeel AS p, inschrijving AS i WHERE i.activiteitid = :id AND i.personeelid = p.idpersoneel";

        $statement2 = $connection->prepare($sql2);
        $statement2->bindValue(':id', $id);
        $statement2->execute();

        $personeel = $statement2->fetchAll();
      } catch(PDOException $error) {
          echo $sql . "<br>" . $error->getMessage();
      }

      echo ("
      <h1>" . escape($activiteit['naam']) . " in " . escape($activiteit['locatie'])  . "</h1>
      <h6>".substr(escape($activiteit['begintijd']),0,-3) ."-".substr(escape($activiteit['eindtijd']),0,-3)."</h6>"    
    );
?>

<h2>Inschrijven:</h2>
<form method="post" onsubmit="return validateInschrijving()" class="row g-3 align-items-center needs-validation" novalidate>
  <div class="col-auto">
    <label for="personeelid" class="form-label sr-only">Personeel ID</label>
    <input type="number" class="form-control" id="personeelid" name="personeelid" placeholder="Personeel ID" required>
  </div>
  <div class="col-auto">
    <label for="voucher"  class="form-label sr-only">Vouchercode</label>
    <input type="text" class="form-control" id="voucher" name="voucher" placeholder="Voucher code" required>
  </div>
  <input class="form-control" type="hidden" id="id" name="id" value=<?php echo($_GET['id']) ?>>
  <div class="col-auto">
  <button type="submit" type="submit" name="submit" value="Submit" class="btn btn-primary" >Inschrijven</button>
  </div>
</form>


<?php
    if($personeel && $statement->rowCount() > 0){
        echo ("<h2>Deze collegas hebben zich al ingeschreven:</h2>");
    foreach ($personeel as $row) {
      echo ('' . escape($row['personeelsnaam']) . '<br>' );
     }
    }
    } else {
        echo "Helaas kan je deze pagina niet bekijken zonder een activiteit te hebben aangeklikt";
        exit;
    }
?>
</div>




<?php include '../../includefiles/footer.php'; ?> 