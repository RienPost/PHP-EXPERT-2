<?php
session_start();

$_SESSION['username'] = "Reparatie";
echo $_SESSION['username'];


require "database.php";
// include "delete.php";


// $sql = "SELECT * FROM fiets";
// $stmt = $db_conn->prepare($sql);
// $stmt->execute();
// $alle_fiesten = $stmt->fetchAll(PDO::FETCH_ASSOC);






if (isset($_POST['maakfiets'])) {
    // $id = $_POST['id'];
    $username = $_POST['username'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $wachtwoord = $_POST['wachtwoord'];
    $sql = "INSERT INTO klant (username, achternaam, email, telefoonnummer, wachtwoord) VALUES ('$username', '$achternaam', '$email', '$telefoonnummer', '$wachtwoord')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $achternaam, $email, $telefoonnummer, $wachtwoord]);
}

/*if (isset($_POST['deletefiets'])) {
    $deleteFiets = "DELETE FROM reparatie WHERE titel='Gazelle';";
    $stmt = $db_conn->prepare($deleteFiets);
    $stmt->execute($deleteFiets);
    header("refresh:0");
}*/

?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        body {
            background-color: gray;
        }

        .container-md {
            border: solid 3px black;
            height: 50em;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            color: black;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
        }

        th {
            background-color: cornflowerblue;
            color: black;
        }

        tr {
            background-color: lightgray;
            color: black;
        }
    </style>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-gray">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Snelle Jelle</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="medewerkerprofiel.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="mklantenbekijken.php">Klant Bekijken</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="MedewerkersReparatie.php">Reparatie Overzicht/Wijzigen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mfietsgegevens.php">Fiets Gegevens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="loguit.php">Uitloggen</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


<body>
    <div class="container-md">

        <form method=post>
            <input type="text" name="id">
            <input type="text" name="username">
            <input type="text" name="achternaam">
            <input type="text" name="email">
            <input type="text" name="telefoonnummer">
            <input type="text" name="wachtwoord">
            <button name="maakfiets">Voeg gebruiker toe</button>
        </form>
        <table>
            <?php

            include "database.php";

            // $id = $_POST['id'];
            // $titel = $_POST['titel'];
            // $datum = $_POST['datum'];
            // $tijdstip = $_POST['tijdstip'];
            // $opmerkingen = $_POST['opmerkingen'];
            // $kosten = $_POST['kosten'];
            // $maakFiets = "INSERT INTO reparatie (titel, datum, tijdstip, opmerkingen, kosten) VALUES ('$titel', '$datum', '$tijdstip', '$opmerkingen', '$kosten')";

            try {
                $stuk = "SELECT * ,time_format(email,'%H:%i') AS time FROM klant";
                $query = $pdo->prepare($stuk);
                $query->execute();
                $fix = $query->fetchAll(PDO::FETCH_ASSOC);
                echo "<table class=\"table table-dark table-hover\">";
                echo "<tr>";
                echo "<th>Klant id</th>";
                echo "<th>Voornaam</th>";
                echo "<th>Achternaam</th>";
                echo "<th>Email</th>";
                echo "<th>Telefoonnummer</th>";
                echo "<th>Wachtwoord</th>";
                echo "<th></th>";
                echo "<th></th>";
                echo "</tr>";
                foreach ($fix as $row) {
                    $id = $row['id'];
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['achternaam'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['telefoonnummer'] . "</td>";
                    echo "<td>" . $row['wachtwoord'] . "</td>";
                    echo "<td><a href=\"klantendelete.php?id=$id\">Delete</a></td>";
                    echo "<td><a href=\"updateklant.php?id=$id\">Update</a></td>";

                    echo "</tr>";
                }
                echo "</table>";
                unset($fix);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

            ?>
        </table>
    </div>
</body>

</html>