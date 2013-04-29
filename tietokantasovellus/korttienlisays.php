<?php
require_once 'yhteys.php';
require_once 'ohjaus.php';
require_once 'session.php';
kirjautumisenvarmistus();

/**
 * mikäli jokin arvoista on väärin, ohjataan takaisin korttienlisäämiseen
 */

        if(strlen($_POST["nimi"])<1 || strlen($_POST["vari"])<1 
                || strlen($_POST["manacost"])<1 || strlen($_POST["tyyppi"])<1
                || strlen($_POST["setti"])<1){
            
            
            ohjaa(korttienlisaaminen.php);
            die();
        }
/**
 * lisätään kortti tietokantaan
 */

        $kyselyt = $yhteys->prepare("INSERT INTO kortit 
            (nimi, vari, manacost, tyyppi, setti) VALUES (?,?,?,?,?)");
        
        $kyselyt->execute(array($_POST["nimi"], $_POST["vari"], 
            $_POST["manacost"],$_POST["tyyppi"], $_POST["setti"]));
        
       echo "Kortin lisääminen onnistui";
       
/**
 * etsitään käyttäjän omistama lista
 */
        $kysely2 = $yhteys->prepare("SELECT * FROM lista WHERE omistaja = 
        $session->kayttaja_id");
        $kysely2->execute();
       

        $lista =$kysely2->fetch();
        $listaid = $lista["id"];

        /**
         * etsitään korttilistasta äsken lisätty kortti
         */
        
        $id = $yhteys->lastInsertId("kortit_id_seq");
        $kysely3 = $yhteys->prepare("SELECT * FROM kortit WHERE id = $id");
        $kysely3->execute();
        $kortti = $kysely3->fetch();

/**
 * lisätään omistus-tauluun käyttäjän lista ja äsken lisätty kortti
 */
        $kysely4 = $yhteys->prepare("INSERT INTO omistus (lista, kortti) VALUES ($listaid,$id)");
        $kysely4->execute();
        
        
        
?>      <form action ="korttienlisaaminen.php">
        <input type="submit" value="Syötä lisää kortteja">    
        </form>

        <form action ="omatkortit.php">
        <input type="submit" value="Oma korttilista">    
        </form>
