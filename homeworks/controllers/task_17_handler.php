<?php
var_dump($_GET);
$fileID = $_GET['id'];

$sql = "SELECT `image` FROM `images` WHERE `id`= $fileID";
include '../connect.php';
$statement = $pdo->prepare($sql);
$statement->execute();
$fileNameDB = $statement->fetch(PDO::FETCH_ASSOC);
$file = $fileNameDB['image'];
var_dump($file);
$uploadDir = '../uploads/images/';

unlink($uploadDir . $file);

$sql = "DELETE FROM `images` WHERE `images`.`id` = $fileID";
$statement = $pdo->prepare($sql);
$statement->execute();

header('Location: ../task_17.php');