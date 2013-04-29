<?php
require_once 'session.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sisäänkirjautuminen</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <p>Kirjaudu sisään tai rekisteröidy uutena käyttäjänä</p>
 
        <?php
        if($session->kirjautumisvirhe){
            echo "Käyttäjätunnus tai salasana väärin";
            unset($session->kirjautumisvirhe);
        }
        /**
         * Ohjelman etusivu, tarjoaa lomakkeen jonka avulla 
         * voidaan kirjautua sisään. MIkäli sisäänkirjautuminen epäonnistuu,
         * annetaan virheilmoitus
         */
        
        
        ?>
        
        <form action="kirjaus.php" method="post">
        <p>Nimi: <br>
        <input type="text" name="nimi" id ="nimi"></p>
        <p>Salasana: <br>
        <input type="password" name="salasana" id ="salasana"></p>
        <input type="submit" value="Kirjaudu">
        </form>
        
        <form action ="uusikayttaja.php">
        <input type="submit" value="Uusi käyttäjä">    
        </form>
    </body>
</html>