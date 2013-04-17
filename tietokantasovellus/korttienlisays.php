<?php

try {
    $yhteyks = new PDO("pgsql:host=localhost;dbname=petteriv",
                      "petteriv", "b9f87604b2334db8");
} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}
$yhteyks->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$kysely = $yhteyks->prepare("INSERT INTO kortit13 (nimi, väri, manacost, 
    tyyppi, setti) VALUES (?, ?, ?, ?, ?)");
$kysely->execute(array($_POST["nimi"], $_POST["väri"], $_POST["manacost"],
        $_POST["tyyppi"], $_POST["setti"]));
?>
