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
                    <p>Username</p>
                    <input value="<?php echo $_SESSION['updateklant']['username']; ?>" type="text" name="username">
                </th>
            </tr>
            <tr>
                <th>
                    <p>Achternaam</p>
                    <input value="<?php echo $_SESSION['updateklant']['achternaam']; ?>" type="text" name="achternaam">
                </th>
            </tr>
            <tr>
                <th>
                    <p>Email</p>
                    <input value="<?php echo $_SESSION['updateklant']['email']; ?>" type="text" name="email">
                </th>
            </tr>
            <tr>
                <th>
                    <p>Telefoonnummer</p>
                    <input value="<?php echo $_SESSION['updateklant']['telefoonnummer']; ?>" type="text" name="telefoonnummer">
                </th>
            </tr>
            <tr>
                <th>
                    <p>Wachtwoord</p>
                    <input value="<?php echo $_SESSION['updateklant']['wachtwoord']; ?>" type="text" name="wachtwoord">
                </th>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="Opslaan" class="w-100 btn btn-lg" id="kleur3"></td>
            </tr>
            <tr>
                <td><button type="button" class="w-100 btn btn-lg" onclick="window.location.href='mklantenbekijken.php'">Ga terug</button></td>
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
    $sql = "SELECT * FROM klant WHERE id = $id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array("id" => $id));
    $updateklant = $stmt->fetch();
    $_SESSION['updateklant'] = $updateklant;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$ID = $_GET['id'];
$sql = "UPDATE klant SET username = :username, achternaam = :achternaam, email = :email, telefoonnummer = :telefoonnummer, wachtwoord = :wachtwoord WHERE id = $id ";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":username", $_POST['username']);
$stmt->bindParam(":achternaam", $_POST['achternaam']);
$stmt->bindParam(":email", $_POST['email']);
$stmt->bindParam(":telefoonnummer", $_POST['telefoonnummer']);
$stmt->bindParam(":wachtwoord", $_POST['wachtwoord']);
$stmt->execute();
//header("location: MedewerkersReparatie.php");


?>