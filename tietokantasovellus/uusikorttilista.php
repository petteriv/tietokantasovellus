<?php
require_once 'ohjaus.php';
require_once 'yhteys.php';
onkokirjautunut();

$kysely=$yhteys->prepare("INSERT INTO lista (omistaja) 
    VALUES($session->kayttaja_id)");
echo "Korttilistan luonti onnistui";

?>
