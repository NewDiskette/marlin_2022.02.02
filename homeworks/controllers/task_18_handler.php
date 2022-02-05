<?php
if(empty($_FILES['file']['name'][0])){
    header('Location: ../task_18.php');
    exit();
}
// var_dump($_FILES);

$file = $_FILES['file'];
// var_dump($file);
$count = count($file['type']);
// var_dump($count);

include '../connect.php';

for($i= 0; $i < $count; $i++){
    
    $info = new SplFileInfo($file['name'][$i]);
    $extension[$i] = $info->getExtension(); 
    // var_dump($extension[$i]);

    $uploadname[$i] = hash('md5', uniqid($file['name'][$i]));
    $uploadfile[$i] = $uploadname[$i] . '.' . $extension[$i];  //записываем имя файла
    // var_dump($uploadfile);
    $uploadpath[$i] = '../uploads/images/'. $uploadfile[$i]; //указываем куда грузить файл

    move_uploaded_file($file['tmp_name'][$i], $uploadpath[$i]);
    //перемещение загруженного файла из временной папки сервера в папку, которую указали (uploadpath)

    $sql = "INSERT INTO `images`(`image`) VALUES ('$uploadfile[$i]')";
    $statement = $pdo->prepare($sql);
    $statement->execute();
}
// header('Location: ../task_18.php');