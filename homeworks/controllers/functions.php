<?php
function getImage($file, $tmp_name){
  
    $info = new SplFileInfo($file);
    $extension = $info->getExtension(); 

    $uploadname = hash('md5', uniqid($file));
    $uploadfile = $uploadname . '.' . $extension;  //записываем имя файла
    $uploadpath = '../uploads/images/'. $uploadfile; //указываем куда грузить файл

    move_uploaded_file($tmp_name, $uploadpath);
    //перемещение загруженного файла из временной папки сервера в папку, которую указали (uploadpath)

    $sql = "INSERT INTO `images`(`image`) VALUES ('$uploadfile')";
    include '../connect.php';
    $statement = $pdo->prepare($sql);
    $statement->execute();
}