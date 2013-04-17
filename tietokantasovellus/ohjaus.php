<?php
require_once 'session.php';


function ohjaa($osoite) {
  header("Location: $osoite");
  exit;
}

function onkokirjautunut() {
    global $session;
    return isset($session->kayttaja_id);
}

function kirjautumisenvarmistus() {
    if(!onkokirjautunut()){
        ohjaa('index.php');
    }
}
?>
