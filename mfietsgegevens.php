<?php
session_start();

$_SESSION['username'] = "Reparatie";
echo $_SESSION['username'];


require "database.php";


$sql = "SELECT * FROM fiets";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$alle_fiesten = $stmt->fetchAll(PDO::FETCH_ASSOC);






if (isset($_POST['maakfiets'])) {
    // $id = $_POST['id'];
    $merk = $_POST['merk'];
    $model = $_POST['model'];
    $type = $_POST['type'];
    $kleur = $_POST['kleur'];
    $soortrem = $_POST['soortrem'];
    $sql = "INSERT INTO fiets (merk, model, type, kleur, soortrem) VALUES ('$merk', '$model', '$type', '$kleur', '$soortrem')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$merk, $model, $type, $kleur, $soortrem]);
}

// if (isset($_POST['deletefiets'])) {
//     $deleteFiets = "DELETE FROM fiets WHERE (model, merk, type, kleur, soortrem)";
//     $stmt = $db_conn->prepare($deleteFiets);
//     $stmt->execute($deleteFiets);
//     header("refresh:0");
// }
// $stmt = $db_conn->query('SELECT * FROM fiets');
// while ($info = $stmt->fetch()) {
//   echo("<tr><td>" . $info['merk'] . "</td><td>" . $info['model'] . "</td>");
// }
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
            font-family: Arial, Helvetica, sans-serif;
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

    <form method=post>
        <input type="text" name="id">
        <input type="text" name="merk">
        <input type="text" name="model">
        <input type="text" name="type">
        <input type="text" name="kleur">
        <input type="text" name="soortrem">
        <button name="maakfiets">Voeg gebruiker toe</button>
    </form>
    <!-- <table>
        <tr>
            <th>Model</th>
            <th>Merk</th>
            <th>Type</th>
            <th>Kleur</th>
            <th>Soort rem</th>
        </tr> -->
    <?php
    // $conn = mysqli_connect("localhost", "root", "", "snellejelle");
    // if ($conn->connect_error) {
    //     die("Connection failed:" . $conn->connect_error);
    // }

    // $sql = "SELECT merk, model, type, kleur, soortrem FROM fiets";
    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //     while ($row = $result->fetch_assoc()) {
    //         echo "<tr><td>" . $row["merk"] . "</td><td>" . $row["model"] . "</td><td>" . $row["type"] . "</td><td>" . $row["kleur"] . "</td><td>" . $row["soortrem"] . "</td></tr>";
    //     }
    //     echo "<table>";
    // } else {
    //     echo "0 result";
    // }

    // $conn->close();
    // $id = $_POST['id'];
    // $titel = $_POST['titel'];
    // $datum = $_POST['datum'];
    // $tijdstip = $_POST['tijdstip'];
    // $opmerkingen = $_POST['opmerkingen'];
    // $kosten = $_POST['kosten'];
    // $maakFiets = "INSERT INTO reparatie (titel, datum, tijdstip, opmerkingen, kosten) VALUES ('$titel', '$datum', '$tijdstip', '$opmerkingen', '$kosten')";

    try {
        $stuk = "SELECT * ,time_format(model,'%H:%i') AS time FROM fiets";
        $query = $pdo->prepare($stuk);
        $query->execute();
        $fix = $query->fetchAll(PDO::FETCH_ASSOC);
        echo "<table class=\"table table-dark table-hover\">";
        echo "<tr>";
        echo "<th>Klus id</th>";
        echo "<th>Merk</th>";
        echo "<th>Model</th>";
        echo "<th>Type</th>";
        echo "<th>Kleur</th>";
        echo "<th>Soort Rem</th>";
        echo "<th></th>";
        echo "</tr>";
        foreach ($fix as $row) {
            $id = $row['id'];
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['merk'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['type'] . "</td>";
            echo "<td>" . $row['kleur'] . "</td>";
            echo "<td>" . $row['soortrem'] . "</td>";
            echo "<td><a href=\"fietsdelete.php?id=$id\">Delete</a></td>";
            echo "<td><a href=\"updatefiets.php?id=$id\">Update</a></td>";

            echo "</tr>";
        }
        echo "</table>";
        unset($fix);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    ?>
    </table>

    </table>
    </div>
</body>

</html>