<?php
if(empty($_FILES['file']['name'])){
    header('Location: ../task_16(1).php');
    exit();
}

// var_dump($_FILES);
$file = $_FILES['file']['name'];
$tmp_name = $_FILES['file']['tmp_name'];

include 'functions.php';
include '../connect.php';

getImage($file, $tmp_name);

header('Location: ../task_16(1).php');