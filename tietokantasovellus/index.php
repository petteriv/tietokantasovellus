<?php

require_once 'session.php';
session_start();



?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sisäänkirjautuminen</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <form action="kirjaus.php" method="post">
        <p>Nimi: <br>
        <input type="text" name="nimi" id ="nimi"></p>
        <p>Salasana: <br>
        <input type="password" name="salasana" id ="salasana"></p>
        <input type="submit" value="Kirjaudu">
        </form>
        
        <form action ="kayttajanlisays.html">
        <input type="submit" value="Uusi käyttäjä">    
        </form>
    </body>
</html>