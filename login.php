<!DOCTYPE HTML>
<html>

<head>
    <title>Snelle Jelle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        body {
            background-color: gray;
        }

        .form {
            width: 20em;
            border: 2px solid black;

        }
    </style>
</head>

<body>
    <div class="form">
        <h1>Log hier in als Klant</h1>
        <form action="loginprocces.php" method="POST">
            <p>
                <label>Username:</label>
                <input type="text" id="user" name="username" />
            </p>
            <p>
                <label>Password:</label>
                <input type="password" id="pass" name="wachtwoord" />
            </p>
            <p>
                <input type="submit" id="btn" value="Login" />
            </p>
    </div>
    <div class="LoginMedewerker">
        <a href="MedewerkerLogin.php">Login als Medewerker</a>
    </div>
</body>

</html>