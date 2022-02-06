<?php
if(empty($_FILES['file']['name'][0])){
    header('Location: ../task_18(1).php');
    exit();
}
var_dump($_FILES);

$file = $_FILES['file'];
$count = count($file['type']);

include 'functions.php';
include '../connect.php';

for($i= 0; $i < $count; $i++){
    $image = $file['name'][$i];
    $tmp_name = $file['tmp_name'][$i];
    getImage($image, $tmp_name);
}    

header('Location: ../task_18(1).php');