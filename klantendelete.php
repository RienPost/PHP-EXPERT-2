<?php
require 'database.php';
$id = $_GET['id'];
$sql = "DELETE FROM klant WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();
header('location: mklantenbekijken.php');
