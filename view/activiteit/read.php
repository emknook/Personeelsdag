
<?php $title = "Activiteit";
 include '../../includefiles/header.php'; ?> 

<div class="container">
<?php

    require "../../includefiles/config.php";
    require "../../includefiles/common.php";


    if (isset($_GET['id'])) {
      try {
        $connection = new PDO($dsn, $username, $pass, $options);
        $id = $_GET['id'];
        $sql = "SELECT * FROM activiteit WHERE activiteit.idactiviteit = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
    
        $activiteit = $statement->fetch();

        $sql2 = "SELECT CONCAT( p.voorletters,' ', p.tussenvoegsel,' ', p.achternaam) AS personeelsnaam 
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
      <h6>".substr(escape($activiteit['begintijd']),0,-3) ."-".substr(escape($activiteit['eindtijd']),0,-3).", deadline: " . escape($activiteit['deadline']) . "</h6>
      <p class='lead'>". escape($activiteit['omschrijving']) . "</p>"    
    );

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