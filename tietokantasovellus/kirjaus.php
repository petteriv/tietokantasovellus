<?php

require_once 'ohjaus.php';
require_once 'session.php';
require_once 'yhteys.php'; 


echo 'ei toimi fiäl';

    $kysely = $yhteys->prepare('SELECT id FROM kayttajat WHERE nimi = ? AND salasana = ?');
    $kysely->execute(array($_POST["nimi"], $_POST["salasana"]));
    if($rivi = $kysely->fetch()){
      

    $kayttaja = $rivi["id"];
    
    $session->kayttaja_id = $kayttaja;
    header("Location: korttilista.php");
    }else{
        $session->kirjautumisvirhe = true;
        header("Location: index.php");
    }

//    echo "id on: $kayttaja";
    
 

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
