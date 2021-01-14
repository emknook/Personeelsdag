<?php include '../../includefiles/header.php'; ?> 

<div class="container">
<?php

    require "../../includefiles/config.php";
    require "../../includefiles/common.php";


    try {
        $connection = new PDO($dsn, $username, $pass, $options);

        $sql = "SELECT *
        FROM activiteit"
        ;

        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
    }  catch (PDOEXception $error){
        echo $sql . "<br>" .$error->getMessage();
    }

?>
<ul class="list-group">
  <li class="list-group-item"><a href="/admin.php">Administratiepaneel</a></li>
  <li class="list-group-item"><a href="/view/personeel/read.php">Personeellijst</a></li>
  <li class="list-group-item"><a href="/view/users/read.php">Gebruikers</a></li>
  <li class="list-group-item"><a href="create.php">Nieuwe activiteit</a></li>
</ul>

<?php 


    if($result && $statement->rowCount() > 0) { ?>
    <h2> Activiteit </h2>

    <table class="table">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Locatie</th>
                <th>Deadline</th>
                <th>Plekken</th>
                <th>Aanpassen</th>
                <th>Inschrijvingen</th>
                <th>Verwijderen</th>
            </tr>
        </thead>
        <tbody>
<?php foreach ($result as $row) {
 echo ('<tr><td>' . escape($row['naam']) . '</td>' );
 echo ('<td>' . escape($row['locatie']) . '</td>' );
 echo ('<td>' . escape($row['deadline']) . '</td>' );
 echo ('<td>' . escape($row['aantal']) . '</td>' );
 echo ('<td><a href="/view/activiteit/update.php?id=' . escape($row['idactiviteit']) . '">aanpassen</a></td>' );
 echo ('<td><a href="/view/inschrijving/read.php?id=' . escape($row['idactiviteit']) . '">inschrijvingen</a></td>' );
 echo ('<td><a href="/view/activiteit/delete.php?id=' . escape($row['idactiviteit']) . '">verwijderen</a></td></tr>' );
}
 ?>
</tbody>
</table>
    <?php
    } else {
        echo 'Geen resultaten';
    }
    
?>
</div>




<?php include '../../includefiles/footer.php'; ?> 