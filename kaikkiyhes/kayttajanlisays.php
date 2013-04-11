<?php

// yhteyden muodostus tietokantaan
try {
    $yhteys = new PDO("pgsql:host=localhost;dbname=petteriv",
                      "petteriv", "b9f87604b2334db8");
} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}



$kysely = $yhteys->prepare("INSERT INTO kayttajat (nimi, salasana) VALUES (?, ?)");
$kysely->execute(array($_POST["nimi"], $_POST["salasana"]));



?>
<p> käyttäjän lisäys onnistui</p>


