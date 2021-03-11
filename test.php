<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
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
</body>

</html>