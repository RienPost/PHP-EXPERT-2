<?php
require '../db.php';
if(!isset($_SESSION["memail"])){
    header("Location: ../mlogin.php");
    exit();
  }
try {
    $ID = $_GET['id'];
    $sql = "SELECT * FROM reparaties WHERE id=$id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(":ID" => $ID));
    $editklus = $stmt->fetch();
    $_SESSION["editklus"] = $editklus;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Handige Mannen | Klus bewerken</title>
    <link href="../css/kieslogin.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body id="body">

    <main class="container">
        <div class="kieslogin-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        </div>
        <form method="post" id="login">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <td><input value="<?php echo $ID; ?>" type="text" id="id" name="id" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" disabled>
                    </td>
                </tr>
                <tr>
                    <th>Adres</th>
                    <td><input value="<?php echo $_SESSION['editklus']['adres']; ?>" type="text" id="achternaam"
                            name="achternaam" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th>Verdieping</th>
                    <td><input value="<?php echo $_SESSION['editklus']['verdieping']; ?>" type="text" id="email"
                            name="email" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th>Locatie</th>
                    <td><input value="<?php echo $_SESSION['editklus']['locatie']; ?>" type="text" id="telefoonnummer"
                            name="telefoonnummer" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th>Lengte</th>
                    <td><input value="<?php echo $_SESSION['editklus']['lengte']; ?>" type="text" id="email"
                            name="email" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th>Breedte</th>
                    <td><input value="<?php echo $_SESSION['editklus']['breedte']; ?>" type="text" id="telefoonnummer"
                            name="telefoonnummer" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th>Hoogte</th>
                    <td><input value="<?php echo $_SESSION['editklus']['hoogte']; ?>" type="text" id="email"
                            name="email" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th>Gebeurtenis</th>
                    <td><input value="<?php echo $_SESSION['editklus']['gebeurtenis']; ?>" type="text"
                            id="telefoonnummer" name="telefoonnummer" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th>Opmerkingen</th>
                    <td><input value="<?php echo $_SESSION['editklus']['opmerkingen']; ?>" type="text" id="email"
                            name="email" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th>Datum</th>
                    <td><input value="<?php echo $_SESSION['editklus']['datum']; ?>" type="date" id="telefoonnummer"
                            name="telefoonnummer" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th>Tijd</th>
                    <td><input value="<?php echo $_SESSION['editklus']['tijd']; ?>" type="time" id="adres" name="adres"
                            class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" value="Opslaan" class="w-100 btn btn-lg" id="kleur3"></td>
                </tr>
                <tr>
                    <th></th>
                    <td><button type="button" class="w-100 btn btn-lg" onclick="window.location.href='./klussen.php'"
                            id="kleur3">Ga terug</button></td>
                </tr>
            </table>
        </form>
    </main>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ID = $_GET['id'];
            $sql = "UPDATE users SET voornaam = :voornaam, achternaam = :achternaam, email = :email, telefoonnummer = :telefoonnummer, adres = :adres WHERE ID = $ID ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":voornaam", $_POST['voornaam']);
            $stmt->bindParam(":achternaam", $_POST['achternaam']);
            $stmt->bindParam(":email", $_POST['email']);
            $stmt->bindParam(":telefoonnummer", $_POST['telefoonnummer']);
            $stmt->bindParam(":adres", $_POST['adres']);
            $stmt->execute();
            header("location: ./klanten.php");
            }
?>

</body>

</html>