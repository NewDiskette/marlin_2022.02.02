<?php
session_start();
if (isset($_SESSION['message'])) unset($_SESSION['message']);

// var_dump($_POST);
$text = $_POST['text'];
$sql = "SELECT `text` FROM `posts`";
include '../connect.php';
$statement = $pdo->prepare($sql);
$statement->execute();
$textDB = $statement->fetchAll(PDO::FETCH_ASSOC);
// var_dump($textDB);

$count = count($textDB);
for($i = 0; $i < $count; $i++){
    if($text == $textDB[$i]['text']){
        $_SESSION['message'] = 'You should check in on some of those fields below.';
        header('Location: ../task_10.php');
    }
}

$sql = "INSERT INTO `posts`(`text`) VALUES ('$text')";
include '../connect.php';
$statement = $pdo->prepare($sql);
$statement->execute();