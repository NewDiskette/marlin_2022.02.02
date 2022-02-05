<?php
session_start();
var_dump($_POST);
$_SESSION['message'] = $_POST['text'];
header('Location: ../task_12.php');