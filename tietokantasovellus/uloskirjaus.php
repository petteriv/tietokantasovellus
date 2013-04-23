

<?php
require_once 'session.php';
require_once 'ohjaus.php';
kirjauduulos();
header("Location: index.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form>
    <form action="index.php" method="post">
    <input type="submit" value="Etusivu">
    </form>
