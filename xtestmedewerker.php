<?php
include "xtestdb.php";


                try {
                    $stuk = "SELECT * ,time_format(tijdstip,'%H:%i') AS time FROM reparatie";
                    $query = $pdo->prepare($stuk);
                    $query->execute();
                    $fix = $query->fetchAll(PDO::FETCH_ASSOC);
                        echo "<table class=\"table table-dark table-hover\">";
                        echo "<tr>";
                        echo "<th>Klus id</th>";
                        echo "<th>Titel</th>";
                        echo "<th>Datum</th>";
                        echo "<th>Tijd</th>";
                        echo "<th>Opmerkingen</th>";
                        echo "<th>Kosten</th>";
                        echo "<th></th>";
                        echo "</tr>";
                        foreach ($fix as $row) {
                            $id=$row['id'];
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['titel'] . "</td>";
                            echo "<td>" . $row['datum'] . "</td>";
                            echo "<td>" . $row['tijdstip'] . "</td>";
                            echo "<td>" . $row['opmerkingen'] . "</td>";
                            echo "<td>" . $row['kosten'] . "</td>";
                            echo "<td><a href=\"xtestdelete.php?id=$id\">Delete</a></td>";
                            
                            echo "</tr>";
                        }
                        echo "</table>";
                        unset($fix);
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }

?>