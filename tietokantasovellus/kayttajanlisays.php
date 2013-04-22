<?php
require_once 'session.php';
require_once 'yhteys.php';
require_once 'ohjaus.php';


if(strlen($_POST["nimi"])< 4){
    $session->kayttajanimiliianlyhyt;
    ohjaa("uusikayttaja.php");
    
    die();
    
}
if(strlen($_POST["salasana"])< 4){
    $session->salasanaliianlyhyt;
    ohjaa("uusikayttaja.php");
    die();
}


$kysely = $yhteys->prepare("INSERT INTO kayttajat (nimi, salasana) VALUES (?, ?)");
$kysely->execute(array($_POST["nimi"], $_POST["salasana"]));



?>
<p> käyttäjän lisäys onnistui</p>
<form action ="korttilista.php">
        <input type="submit" value="Jatka sivulle">    
        </form>


