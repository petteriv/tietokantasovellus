


<?php
require_once 'session.php';
require_once 'ohjaus.php';
require_once 'yhteys.php';
kirjautumisenvarmistus();
    
    /**
     * haetaan kaikki kortit ja tulostetaan ne
     */

    $kysely = $yhteys->prepare('SELECT * FROM kortit');
    $kysely->execute();
    
    echo "Kaikki tietokannan kortit";
    echo "<table border>";
    while ($row = $kysely->fetch()) {
        echo "<tr>";
        echo "<td>" . $row["nimi"] ."</td>";
        echo "<td>" . $row["vari"] ."</td>";
        echo "<td>" . $row["manacost"] ."</td>";
        echo "<td>" . $row["tyyppi"] ."</td>";
        echo "<td>" . $row["setti"] ."</td>";
        echo "</tr>";
    }
    
    
    echo "</table>";


?>

<form action="omatkortit.php" method="post">
<input type="submit" value="Omat listat">
 </form>

<form action="uusikorttilista.php" method="post">
<input type="submit" value="Luo oma lista">
 </form>

<form action="uloskirjaus.php" method="post">
<input type="submit" value="kirjaudu ulos">    
</form>