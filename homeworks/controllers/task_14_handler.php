<?php
session_start();
// var_dump($_POST);
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT `password` FROM `users_3` WHERE `email`='$email'";
include '../connect.php';
$statement = $pdo->prepare($sql);
$statement->execute();
$passwordDB = $statement->fetch(PDO::FETCH_ASSOC);
// var_dump($passwordDB);
$hash = $passwordDB['password'];
// var_dump($hash);

if(password_verify($password, $hash)){
    $_SESSION['user'] = $email;
}else{
    $_SESSION['message'] = 'Неверный логин или пароль';
}
header('Location: ../task_14.php');

