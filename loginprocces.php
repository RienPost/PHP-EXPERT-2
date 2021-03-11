<?php
require 'database.php';
//value van form login.php file 
$username = $_POST['username'];
$wachtwoord = $_POST['wachtwoord'];


$sql = "SELECT * FROM klant WHERE username = :ph_username";
$statement = $pdo->prepare($sql);
$statement->bindParam(":ph_username", $username);

if ($statement->execute()) {
    $database_gegevens = $statement->fetch(PDO::FETCH_ASSOC);

    if (is_array($database_gegevens)) { //gegevens gevonden
        if ($wachtwoord == $database_gegevens['wachtwoord']) {
            //dan mag deze gebruiker inloggen
            echo "Welkom! " . $username;
            header("Location: klantprofiel.php");
        } else {
            //Username is bekend maar wachtwoord is verkeerd
            echo "Inloggen is niet gelukt";
        }
    }
}
