<?php
require_once 'session.php';

/**
 * metodi ohjaa halutulle sivulle
 * @param type $osoite halutun sivun osoite, jonne metodi ohjaa
 * 
 */
function ohjaa($osoite) {
  header("Location: $osoite");
  exit;
}
/**
 * metodi tarkastaa onko käyttäjä kirjautunut
 * @global type $session taustalla kulkeva session
 * @return type palauttaa arvon true, mikäli käyttäjä on kirjautunut sisään
 */
function onkokirjautunut() {
    global $session;
    return isset($session->kayttaja_id);
}
/**
 * metodi kirjaa käyttäjän ulos
 * @global type $session
 */
function kirjauduulos() {
    global $session;
    unset($session->kayttaja_id);
}
/**
 * metodi jota muu ohjelma kutsuu, 
 * kun halutaan varmistaa käyttäjän olevan kirjautunut
 */
function kirjautumisenvarmistus() {
    if(!onkokirjautunut()){
        ohjaa('index.php');
    }
}
?>
