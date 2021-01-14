<?php include '../../includefiles/header.php'; ?> 

<div class="container">
<?php

    require "../../includefiles/config.php";
    require "../../includefiles/common.php";


    try {
        $connection = new PDO($dsn, $username, $pass, $options);

        $sql = "SELECT *
        FROM personeel"
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
  <li class="list-group-item"><a href="/view/activiteit/readAll.php">Activiteiten</a></li>
  <li class="list-group-item"><a href="/view/users/read.php">Gebruikers</a></li>
  <li class="list-group-item"><a href="create.php">Nieuw personeel</a></li>
</ul>

<?php 


    if($result && $statement->rowCount() > 0) { ?>
    <h2> Personeel </h2>

    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Naam</th>
                <th>Email</th>
                <th>Voucher</th>
                <th>Aanpassen</th>
                <th>Verwijderen</th>
            </tr>
        </thead>
        <tbody>
<?php foreach ($result as $row) {
 echo ('<tr><td>' . escape($row['idpersoneel']) . '</td>' );
 echo ('<td>' . escape($row['voorletters']) .' '.escape($row['tussenvoegsel']).' '. escape($row['achternaam']). '</td>' );
 echo ('<td>' . escape($row['email']) . '</td>' );
 echo ('<td>' . escape($row['voucher']) . '</td>' );
 echo ('<td><a href="/view/personeel/update.php?id=' . escape($row['idpersoneel']) . '">aanpassen</a></td>' );
 echo ('<td><a href="/view/personeel/delete.php?id=' . escape($row['idpersoneel']) . '">verwijderen</a></td></tr>' );
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