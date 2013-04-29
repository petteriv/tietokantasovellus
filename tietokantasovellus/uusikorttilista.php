<?php
require_once 'session.php';
require_once 'ohjaus.php';
require_once 'yhteys.php';
kirjautumisenvarmistus();
/**
 * luo uuden korttilistan käyttäjän id:n perusteella
 */

$kysely=$yhteys->prepare("INSERT INTO lista (omistaja) 
    VALUES($session->kayttaja_id)");
    $kysely->execute();
    
    
?>
        <form action ="omatkortit.php">
        <input type="submit" value="Listaan">    
        </form>


<?php



?>
