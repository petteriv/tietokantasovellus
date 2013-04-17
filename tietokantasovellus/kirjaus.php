<?php

require_once 'ohjaus.php';
require_once 'session.php';
session_start();  
 
try {
    $yhteys = new PDO("pgsql:host=localhost;dbname=petteriv",
                      "petteriv", "b9f87604b2334db8");
} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}

echo 'edes jotakin?';

    $kysely = $yhteys->prepare('SELECT id FROM kayttajat WHERE nimi = ? AND salasana = ?');
     $kysely->execute(array($_POST["nimi"], $_POST["salasana"]));
      

    $kayttaja = $kysely;
    

    echo "id on: $kayttaja";
    
 

//$tulos = pg_query($kysely);
//
//if(pg_num_rows($tulos) > -1)
//{
//    $_SESSION['kayttaja_loytyy'] = $kayttajanimi;
//}
//if (isset($_SESSION['kayttaja_loytyy'])) {
//    ohjaa('index.php');
//}else {
//    ohjaa('index.php');
//}
    
?>
