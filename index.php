<?php include 'includefiles/header.php';
?> 
<div class="container">
    <h1> SAVE THE DATE: PERSONEELSDAG 30 JUNI 2021 </h1>

    <p>
        Vrijdag 29 juni 2018 is de personeelsdag van onze school “Het Anker”. Een dag in het teken van samen zijn met je collega’s. Samen actieve en creatieve workshops doen. Een dag om niet te vergeten dus! 
    </p>
    <h2>
        Locaties
    </h2>
    <p>
        De personeelsdag vindt plaats op diverse locaties in het land: Nijmegen, Arnhem, Zandvoort en Utrecht 
    </p>
    <h2>
        Activiteiten
    </h2>
    <p>
        We hebben een gevarieerd programma met actieve en creatieve workshops onder leiding van collega’s, studenten en externen. Keuze genoeg dus!  
    </p>
    <h2>
        Inschrijven
    </h2>
    <p>
        Vanaf dinsdag 1 mei 2018 is het mogelijk om in te schrijven. Je kunt je via de links op deze pagina inschrijven! Je kunt twee activiteiten kiezen, één voor de ochtend en één voor de middag. Voor bepaalde activiteiten zijn er meer plekken beschikbaar, dan voor andere activiteiten. Wil jij dus activiteiten kiezen die je erg leuk vindt? Schrijf je dan op tijd in!
    </p>
    <?php

        require_once "includefiles/config.php";
        require_once "includefiles/common.php";


        try {
            $connection = new PDO($dsn, $username, $pass, $options);

            $sql = "SELECT *
            FROM Activiteit_plek"
            ;

            $statement = $connection->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll();
        }  catch (PDOEXception $error){
            echo $sql . "<br>" .$error->getMessage();
        }

        if($result && $statement->rowCount() > 0) { 
            $today = new DateTime();
    ?>
    <h3> Activiteiten </h3>

    <table class="table">
        <thead>
            <tr>
                <th>Activiteit</th>
                <th>Locatie</th>
                <th>Nog plek?</th>
                <th>Inschrijven</th>
                <th>Meer info</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row) {
                echo ('<tr"><td>' . escape($row['naam']) . '</td>' );
                echo ('<td>' . escape($row['locatie']) . '</td>' );
                echo ('<td>' . escape($row['nog_plek'] > 0 ? "Nog " . $row['nog_plek'] . " plaatsen!" : "Vol!") . '</td>' );
                echo ((escape($row['nog_plek']) > 0 && $today->diff(new DateTime($row['deadline']) )->format("%r%a") > 0)  ? '<td><a class="btn btn-primary btn-block" href="view/inschrijving/create.php?id=' . escape($row['idactiviteit']) . '">Inschrijven</a></td>' : '<td><a class="btn btn-danger btn-block">Te laat :( </a></td>');
                //TODO make a function of above operand conditions
                echo ('<td><a class="btn btn-primary btn-block" href="view/activiteit/read.php?id=' . escape($row['idactiviteit']) . '">...</a></td></tr>');
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
<?php include 'includefiles/footer.php'; ?> 