<?php

session_start();
require_once 'connect.php';


ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL);

$ID_car = $_POST['ID_car'];
$marka = $_POST['marka'];
$model = $_POST['model'];
//$config = $_POST['config'];
$price = $_POST['price'];
/*echo '<pre>';
print_r($_FILES);
echo '</pre>';*/
$path3 = 'img/2/' . $_FILES['imgmarka']['name'];
if (!move_uploaded_file($_FILES['imgmarka']['tmp_name'], '../' . $path3)) {
  $_SESSION['message'] = 'Ошибка при загрузке изображения';
  header('Location: ../form1.php');
  exit();
}

$path1 = 'img/3/' . $_FILES['imgcar']['name'];
if (!move_uploaded_file($_FILES['imgcar']['tmp_name'], '../' . $path1)) {
  $_SESSION['message'] = 'Ошибка при загрузке изображения';
  header('Location: ../form1.php');
  exit();
}

$path2 = 'img/2/car/' . $_FILES['img']['name'];
if (!move_uploaded_file($_FILES['img']['tmp_name'], '../' . $path2)) {
  $_SESSION['message'] = 'Ошибка при загрузке изображения';
  header('Location: ../form1.php');
  exit();
}

$sql =  "INSERT INTO `car` (`ID_car`, `marka`,`imgmarka`, `model`,`imgcar`, `price`,`img`) 
                VALUES ( '$ID_car', '$marka','$path3', '$model', '$path1', '$price', '$path2')";

if (mysqli_query($connect, $sql)) {
  header('Location: ../form1.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}
mysqli_close($connect);
