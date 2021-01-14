
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
        $sql = "SELECT naam FROM activiteit WHERE activiteit.idactiviteit = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
    
        $activiteit = $statement->fetch();

        $sql2 = "SELECT CONCAT( p.voorletters,' ', p.tussenvoegsel,' ', p.achternaam) AS personeelsnaam, i.personeelid
        FROM personeel AS p, inschrijving AS i WHERE i.activiteitid = :id AND i.personeelid = p.idpersoneel";

        $statement2 = $connection->prepare($sql2);
        $statement2->bindValue(':id', $id);
        $statement2->execute();

        $personeel = $statement2->fetchAll();
      } catch(PDOException $error) {
          echo $sql . "<br>" . $error->getMessage();
      }

      echo ("
        <h1>" . escape($activiteit['naam']) . "</h1>"    
    );

    if($personeel && $statement->rowCount() > 0){
        echo ("<h2>Dit personeel heeft zich ingeschreven:</h2>
        <table class='table'>
          <thead>
            <tr>
              <th>Naam</th>
              <th>Verwijderen van activiteit</th>
            </tr>
          </thead>
          <tbody>
        ");
      
    foreach ($personeel as $row) {
      echo ('<tr><td>' . escape($row['personeelsnaam']) . '</td>
            <td><a href="/view/inschrijving/delete.php?idpersoneel=' . escape($row['personeelid']) . '&idactiviteit='. $_GET['id'] .'">verwijderen</a></td>
          </tr>' );
     }
     echo ("
        </tbody>
      </table>");
    }
    } else {
        echo "Helaas kan je deze pagina niet bekijken zonder een activiteit te hebben aangeklikt";
        exit;
    }
?>
</div>




<?php include '../../includefiles/footer.php'; ?> 