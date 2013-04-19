<?php
require_once 'yhteys.php';
require_once 'ohjaus.php';
kirjautumisenvarmistus();






        $kyselyt = $yhteys->prepare("INSERT INTO kortit 
            (id, nimi, vari, manacost, tyyppi, setti) VALUES (?,?,?,?,?) ");
       $kyselyt->execute(array($session->kayttaja_id, $_POST["nimi"],$_POST["vari"], $_POST["manacost"],$_POST["tyyppi"]. $_POST["setti"]));
        
       echo "onnistuuko";

//        $kysely2 = $yhteys->prepare("SELECT * FROM lista WHERE id = 
//        $session->kayttaja_id");
//        $kysely2->execute();
//        $lista = $kysely2->fetch();
//        echo "<td>" . $lista["id"] ."</td>";
//        
//        $kysely3 = $yhteys->prepare("SELECT * FROM kortti WHERE id = $id");
//        $kysely3->execute();
//        $kortti = $kysely3->fetch();
//        
//
//        $kysely4 = $yhteys->prepare("INSERT INTO omistus (lista, kortti) 
//            VALUES ($lista,$kortti)");
//        $kysely4->execute();
        
?>
