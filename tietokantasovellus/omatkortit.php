


<?php
require_once 'session.php';
require_once 'ohjaus.php';
require_once 'yhteys.php';
kirjautumisenvarmistus();
?>
        <form action ="korttienlisaaminen.php">
        <input type="submit" value="Lisää listallesi kortteja">    
        </form>
        <form action ="korttilista.php">
        <input type="submit" value="Kaikkien korttien lista">    
        </form>

<?php
/**
 * haetaan käyttäjän lista
 */

$apukysely = $yhteys->prepare("SELECT * FROM lista WHERE omistaja = $session->kayttaja_id");
$apukysely->execute();
$lista = $apukysely->fetch();
$listanid =$lista["id"];
/**
 * haetaan kaikki omistukset, joissa on parametrinä käyttäjän lista
 */

$kysely = $yhteys->prepare("SELECT * FROM omistus WHERE lista = $listanid");
$kysely->execute();

/**
 * tulostetaan taulukkona kaikki käyttäjän listan kortit
 */

echo "<table border>";
while($kortit = $kysely->fetch()){
    $kortinid = $kortit["kortti"];
    $kyselye = $yhteys->prepare("SELECT * FROM kortit WHERE id = $kortinid");
    $kyselye->execute();
        echo "<table border>";
        while ($rivi = $kyselye->fetch()) {
            echo "<tr>";
            echo "<td>" . $rivi["nimi"] . "</td>";
            echo "<td>" . $rivi["vari"] . "</td>";
            echo "<td>" . $rivi["manacost"] . "</td>";
            echo "<td>" . $rivi["tyyppi"] . "</td>";
            echo "<td>" . $rivi["setti"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
}

echo "</table>";
?>
