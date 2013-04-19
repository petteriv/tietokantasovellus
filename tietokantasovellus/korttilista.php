


<?php
require_once 'session.php';
require_once 'ohjaus.php';
require_once 'yhteys.php';
kirjautumisenvarmistus();
    
    $kysely = $yhteys->prepare('SELECT * FROM kortti');
    $kysely->execute();
    
    echo "Kaikki tietokannan kortit";
    echo "<table border>";
    while ($row = $kysely->fetch()) {
        echo "<tr>";
        echo "<td>" . $row["nimi"] ."</td>";
        echo "<td>" . $row["väri"] ."</td>";
        echo "<td>" . $row["manacost"] ."</td>";
        echo "<td>" . $row["tyyppi"] ."</td>";
        echo "<td>" . $row["setti"] ."</td>";
        echo "</tr>";
    }
    
    
    echo "</table>";


?>

<form action="korttienLisays.html" method="post">
<input type="submit" value="Omat listat">
 </form>

<form action="uusikorttilista.php" method="post">
<input type="submit" value="Luo oma lista">
 </form>