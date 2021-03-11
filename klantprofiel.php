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
            <a class="nav-link active" aria-current="page" href="#">Home</a>
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
<?php
session_start();

$_SESSION['username'] = "Klant";
echo $_SESSION['username'];


require "database.php";

$sql = "SELECT * FROM klant";
$statement = $pdo->prepare($sql);
$statement->execute();
$database_gegevens = $statement->fetchAll(PDO::FETCH_ASSOC);


foreach ($database_gegevens as $value) {
}
?>

<body>
  <div class="container-md">
    <table>
      <tr>
        <h2>Klant Profiel<h2>
      </tr>
      <tr>
        <th><?php echo $value["id"]; ?></th>
      </tr>
      <tr>
        <th><?php echo $value["username"]; ?></th>
      </tr>
      <th><?php echo $value["achternaam"]; ?></th>
      <tr>
        <th><?php echo $value["email"]; ?></th>
      </tr>
      <tr>
        <th><?php echo $value["telefoonnummer"]; ?></th>
      </tr>
      </tr>
    </table>
  </div>
</body>

</html>