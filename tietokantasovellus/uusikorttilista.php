<?php
require_once 'ohjaus.php';
require_once 'yhteys.php';
kirjautumisenvarmistus();

$kysely=$yhteys->prepare("INSERT INTO lista (omistaja) 
    VALUES($session->kayttaja_id)");
if($kysely->execute()){
    $session->listanluontionnistui = true;
    ohjaa(korttienlisaaminen.php);
}  else {
    ohjaa(korttilista.php);
    $session->listanluontionnistui = false;
}




?>
