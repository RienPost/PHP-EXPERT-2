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
                    <input value="<?php echo $_SESSION['updatefiets']['merk']; ?>" type="text" name="merk">
                </th>
            </tr>
            <tr>
                <th>
                    <p>Datum</p>
                    <input value="<?php echo $_SESSION['updatefiets']['model']; ?>" type="date" name="model">
                </th>
            </tr>
            <tr>
                <th>
                    <p>Tijdstip</p>
                    <input value="<?php echo $_SESSION['updatefiets']['type']; ?>" type="time" name="type">
                </th>
            </tr>
            <tr>
                <th>
                    <p>Opmerkingen</p>
                    <input value="<?php echo $_SESSION['updatefiets']['kleur']; ?>" type="text" name="kleur">
                </th>
            </tr>
            <tr>
                <th>
                    <p>Kosten</p>
                    <input value="<?php echo $_SESSION['updatefiets']['soortrem']; ?>" type="int" name="soortrem">
                </th>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="Opslaan" class="w-100 btn btn-lg" id="kleur3"></td>
            </tr>
            <tr>
                <td><button type="button" class="w-100 btn btn-lg" onclick="window.location.href='mfietsgegevens.php'" id="kleur3">Ga terug</button></td>
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
    $sql = "SELECT * FROM fiets WHERE id = $id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array("id" => $id));
    $updatefiets = $stmt->fetch();
    $_SESSION['updatefiets'] = $updatefiets;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$ID = $_GET['id'];
$sql = "UPDATE fiets SET merk = :merk, model = :model, type = :type, kleur = :kleur, soortrem = :soortrem WHERE id = $id ";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":merk", $_POST['merk']);
$stmt->bindParam(":model", $_POST['model']);
$stmt->bindParam(":type", $_POST['type']);
$stmt->bindParam(":kleur", $_POST['kleur']);
$stmt->bindParam(":soortrem", $_POST['soortrem']);
$stmt->execute();
//header("location: MedewerkersReparatie.php");


?>