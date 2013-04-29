<?php
require_once 'session.php';


?>

<html>
    <head>
        <title>Uusi käyttäjä</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <p>Käyttäjänimen ja salasanan on oltava vähintään 4 merkkiä pitkiä</p>
        
        <?php
        
        /**
         * lomake jonka avulla voidaan antaa arvot uudelle käyttäjälle
         * mikäli arvot ovat väärin, annetaan virheilmoitus
         */
            if($session->kayttajanimiliianlyhyt){
            echo "Käyttäjänimi on liian lyhyt";
            unset($session->kayttajanimiliianlyhyt);
        }
            if($session->salasanaliianlyhyt){
            echo "Salasana on liian lyhyt";
            unset($session->salasanaliianlyhyt);
        }
        
        ?>
        <form action="kayttajanlisays.php" method="post">
        <p>Nimi: <br>
 
        <input type="text" name="nimi"></p>
        <p>Salasana: <br>
        <input type="text" name="salasana"></p>
        <input type="submit" value="Uusi käyttäjä">
        </form>
        
        <form action="index.php" method="post">
        <input type="submit" value="Etusivu">    
        </form>
    </body>
</html>
