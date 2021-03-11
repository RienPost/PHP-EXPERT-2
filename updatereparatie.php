<html>

<body>
    <form method=post>
        <table>
            <tr>
                <th>
                    <p>ID</p>
                    <input type="text" name="ID">
                </th>
            </tr>
            <tr>
                <th>
                    <p>Titel</p>
                    <input value="<?php echo $_SESSION['updateklus']['titel']; ?>" type="text" name="titel">
                </th>
            </tr>
            <tr>
                <th>
                    <p>Datum</p>
                    <input value="<?php echo $_SESSION['updateklus']['datum']; ?>" type="date" name="datum">
                </th>
            </tr>
            <tr>
                <th>
                    <p>Tijdstip</p>
                    <input value="<?php echo $_SESSION['updateklus']['tijdstip']; ?>" type="time" name="tijdstip">
                </th>
            </tr>
            <tr>
                <th>
                    <p>Opmerkingen</p>
                    <input value="<?php echo $_SESSION['updateklus']['opmerkingen']; ?>" type="text" name="opmerkingen">
                </th>
            </tr>
            <tr>
                <th>
                    <p>Kosten</p>
                    <input value="<?php echo $_SESSION['updateklus']['kosten']; ?>" type="int" name="kosten">
                </th>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="Opslaan" class="w-100 btn btn-lg" id="kleur3"></td>
            </tr>
            <tr>
                <td><button type="button" class="w-100 btn btn-lg" onclick="window.location.href='MedewerkersReparatie.php'" id="kleur3">Ga terug</button></td>
            </tr>
        </table>
    </form>
</body>

</html>
<?php
require 'database.php';
// if (!isset($_SESSION["updateklus"])) {
//     // header("Location: MedewerkerLogin.php");
//     exit();
// }


try {
    $id = $_GET['id'];
    $sql = "SELECT * FROM reparatie WHERE id = $id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array("id" => $id));
    $updateklus = $stmt->fetch();
    $_SESSION['updateklus'] = $updateklus;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$ID = $_GET['id'];
$sql = "UPDATE reparatie SET titel = :titel, datum = :datum, tijdstip = :tijdstip, opmerkingen = :opmerkingen, kosten = :kosten WHERE id = $id ";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":titel", $_POST['titel']);
$stmt->bindParam(":datum", $_POST['datum']);
$stmt->bindParam(":tijdstip", $_POST['tijdstip']);
$stmt->bindParam(":opmerkingen", $_POST['opmerkingen']);
$stmt->bindParam(":kosten", $_POST['kosten']);
$stmt->execute();
//header("location: MedewerkersReparatie.php");


?>