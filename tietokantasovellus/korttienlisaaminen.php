<?php
require_once 'session.php';
require_once 'ohjaa.php';
kirjautumisenvarmistus();

if($session->listanluontionnistui = true){
    echo "Uuden listan luonti onnistui";
    unset($session->listanluontionnistui);
}
?>


<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <form action="korttienlisays.php" method="post">
        <p>Nimi: <br>
        <input type="text" name="nimi"></p>
        <p>Väri: <br>
        <input type="text" name="vari"></p>
        <p>Manacost: <br>
        <input type="Integer" name="manacost"></p>
        <p>Tyyppi: <br>
        <input type="text" name="tyyppi"></p>
        <p>Setti: <br>
        <input type="text" name="setti"></p>        
        <input type="submit" value="Uusi kortti">
        </form>
        <form action="korttilista.php" method="post">
        <input type="submit" value="Takaisin">
        </form>
    </body>
</html>
