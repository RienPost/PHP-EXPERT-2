<?php
require 'xtestdb.php';
$id = $_GET['id'];
$sql = "DELETE FROM reparatie WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();
header('location: xtestmedewerker.php');
