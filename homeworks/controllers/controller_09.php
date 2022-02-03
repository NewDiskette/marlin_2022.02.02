<?php
var_dump($_POST);
$text = $_POST['text'];
$sql = "INSERT INTO `posts`(`text`) VALUES ('$text')";
include '../connect.php';
$statement = $pdo->prepare($sql);
$statement->execute();