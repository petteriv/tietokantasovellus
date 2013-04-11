<?php

require_once 'ohjaus.php';
    session_start();
    
    if (isset($_POST['nimi']) && isset($_POST['salasana']))
    {
        $kayttajanimi = $_POST['nimi'];
        $salasana = $_POST['salasana'];
    }
        
try {
    $yhteys = new PDO("pgsql:host=localhost;dbname=petteriv",
                      "petteriv", "b9f87604b2334db8");
} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}

$kysely = $yhteys->prepare("SELECT * FROM kayttajat WHERE nimi=$kayttajanimi 
    AND salasana=$salasana ");

$tulos = pg_query($kysely);

if(pg_num_rows($tulos) > -1)
{
    $_SESSION['kayttaja_loytyy'] = $kayttajanimi;
}
if (isset($_SESSION['kayttaja_loytyy'])) {
    ohjaa('index.php');
}else {
    echo 'ei onnistu pelle';
}
    
?>
