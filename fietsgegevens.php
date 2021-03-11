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
    $titel = $_POST['titel'];
    $model = 0;
    $type = 0;
    $kleur = 0;
    $maakFiets = "INSERT INTO reparatie (titel, datum, tijdstip, opmerkingen, kosten) VALUES (?,?,?,?,?)";
    $stmt = $db_conn->prepare($maakFiets);
    var_dumP($stmt->execute([$titel]));
    header("refresh:0");
}

if (isset($_POST['deletefiets'])) {
    $deleteFiets = "DELETE FROM fiets WHERE (model, merk, type, kleur)";
    $stmt = $db_conn->prepare($deleteFiets);
    $stmt->execute($deleteFiets);
    header("refresh:0");
}
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
                        <a class="nav-link active" aria-current="page" href="klantprofiel.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reparatie.php">Reparatie Overzicht</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="fietsgegevens.php">Fiets Gegevens</a>
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
    <table>
        <tr>
            <th>Model</th>
            <th>Merk</th>
            <th>Type</th>
            <th>Kleur</th>
            <th>Soort rem</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "snellejelle");
        if ($conn->connect_error) {
            die("Connection failed:" . $conn->connect_error);
        }

        $sql = "SELECT merk, model, type, kleur, soortrem FROM fiets";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["merk"] . "</td><td>" . $row["model"] . "</td><td>" . $row["type"] . "</td><td>" . $row["kleur"] . "</td><td>" . $row["soortrem"] . "</td></tr>";
            }
            echo "<table>";
        } else {
            echo "0 result";
        }

        $conn->close();
        ?>
    </table>
    </div>
</body>

</html>