<?php
if(empty($_FILES['file']['name'])){
    header('Location: ../task_16.php');
    exit();
}

// var_dump($_FILES);
$file = $_FILES['file']['name'];

$info = new SplFileInfo($file);
$extension = $info->getExtension(); 
// var_dump($extension);

$uploadname = hash('md5', uniqid($file));
$uploadfile = $uploadname . '.' . $extension;  //записываем имя файла
// var_dump($uploadfile);
$uploadpath = '../uploads/images/'. $uploadfile; //указываем куда грузить файл

move_uploaded_file($_FILES['file']['tmp_name'], $uploadpath);
//перемещение загруженного файла из временной папки сервера в папку, которую указали (uploadpath)

$sql = "INSERT INTO `images`(`image`) VALUES ('$uploadfile')";
include '../connect.php';
$statement = $pdo->prepare($sql);
$statement->execute();

header('Location: ../task_16.php');