<?php
session_start();
// var_dump($_POST);
$email = $_POST['email'];
$password = $_POST['password'];
$password = password_hash($password, PASSWORD_DEFAULT);

$sql = "SELECT `email` FROM `users_3`";
include '../connect.php';
$statement = $pdo->prepare($sql);
$statement->execute();
$emailDB = $statement->fetchAll(PDO::FETCH_ASSOC);
// var_dump($emailDB);

$count = count($emailDB);
for($i = 0; $i < $count; $i++){
    if($email == $emailDB[$i]['email']){
        $_SESSION['message'] = 'Этот эл адрес уже занят другим пользователем';
        header('Location: ../task_11.php');
    }
}

$sql = "INSERT INTO `users_3`(`email`, `password`) VALUES ('$email', '$password')";
$statement = $pdo->prepare($sql);
$statement->execute();