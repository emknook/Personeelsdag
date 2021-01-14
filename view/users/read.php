<?php include '../../includefiles/header.php'; ?> 
<div class="container">
<?php

    require "../../includefiles/config.php";
    require "../../includefiles/common.php";


    try {
        $connection = new PDO($dsn, $username, $pass, $options);

        $sql = "SELECT *
        FROM users"
        ;

        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
    }  catch (PDOEXception $error){
        echo $sql . "<br>" .$error->getMessage();
    } ?>
<ul class="list-group">
  <li class="list-group-item"><a href="/admin.php">Administratiepaneel</a></li>
  <li class="list-group-item"><a href="/view/personeel/read.php">Personeellijst</a></li>
  <li class="list-group-item"><a href="/view/activiteit/readAll.php">Activiteiten</a></li>
  <li class="list-group-item"><a href="create.php">Nieuwe gebruiker</a></li>
</ul>
    <?php

    if($result && $statement->rowCount() > 0) { ?>
        <h2> Gebruikers </h2>

        <table class="table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Aanpassen</th>
                    <th>Verwijderen</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($result as $row) {
                        echo ('<tr><td>' . escape($row['username']) . '</td>' );
                        echo ('<td><a href="/view/users/update.php?id=' . escape($row['username']) . '">aanpassen</a></td>' );
                        if(escape($row['username']) != $_SESSION['username']){
                            echo ('<td><a href="/view/users/delete.php?id=' . escape($row['username']) . '">verwijderen</a></td></tr>' );
                        } else{
                            echo '<td>Kan niet</td></tr>';
                        }
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