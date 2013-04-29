<?php

require_once 'ohjaus.php';
require_once 'session.php';
require_once 'yhteys.php'; 


    /**
     * Tarkistetaan onko annettua käyttäjänimeä tai salasanaa tietokannassa
     */

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


    
?>
