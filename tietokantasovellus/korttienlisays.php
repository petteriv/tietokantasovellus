<?php
require_once 'yhteys.php';
require_once 'ohjaus.php';
require_once 'session.php';
kirjautumisenvarmistus();



        if(strlen($_POST["nimi"])<1 || strlen($_POST["vari"])<1 
                || strlen($_POST["manacost"])<1 || strlen($_POST["tyyppi"])<1
                || strlen($_POST["setti"])<1){
            
            
            ohjaa(index.php);
            die();
        }


        $kyselyt = $yhteys->prepare("INSERT INTO kortit 
            (nimi, vari, manacost, tyyppi, setti) VALUES (?,?,?,?,?)");
        
        $kyselyt->execute(array($_POST["nimi"], $_POST["vari"], 
            $_POST["manacost"],$_POST["tyyppi"], $_POST["setti"]));
        
       echo "Kortin lisääminen onnistui";
       

        $kysely2 = $yhteys->prepare("SELECT * FROM lista WHERE omistaja = 
        $session->kayttaja_id");
        $kysely2->execute();
       
//        echo "<table border>";
//        while ( $lista = $kysely2->fetch()) {
//            echo "<tr>";
//            echo "<td>" . $lista["id"] . "</td>";
//            echo "<td>" . $lista["omistaja"] . "</td>";
//            echo "</tr>";
//        }
//        echo "</table>";
        $lista =$kysely2->fetch();
        $listaid = $lista["id"];

        
        
        $id = $yhteys->lastInsertId("kortit_id_seq");
        $kysely3 = $yhteys->prepare("SELECT * FROM kortit WHERE id = $id");
        $kysely3->execute();
        $kortti = $kysely3->fetch();
        echo "$id";
        echo "<table border>";
        while ( $kortit = $kysely3->fetch()) {
            echo "<tr>";
            echo "<td>" . $kortit["nimi"] . "</td>";
            echo "<td>" . $kortit["vari"] . "</td>";
            echo "<td>" . $kortit["manacost"] . "</td>";
            echo "<td>" . $kortit["tyyppi"] . "</td>";
            echo "<td>" . $kortit["setti"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
//        
//        
//
        $kysely4 = $yhteys->prepare("INSERT INTO omistus (lista, kortti) VALUES ($listaid,$id)");
        $kysely4->execute();
        
        
        
?>      <form action ="korttienlisaaminen.php">
        <input type="submit" value="Syötä lisää kortteja">    
        </form>

        <form action ="omatkortit.php">
        <input type="submit" value="Oma korttilista">    
        </form>
