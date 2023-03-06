<?php

session_start();
require_once 'connect.php';
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL);

$ID_config = $_POST['ID_config'];
$cID_car = $_POST['cID_car'];
$cconfig = $_POST['cconfig'];
$ID_bodywork = $_POST['сID_bodywork'];
$year = $_POST['year'];
$country = $_POST['country'];
$engine = $_POST['engine'];
$kb = $_POST['kb'];
$drive = $_POST['drive'];
$fuel = $_POST['fuel'];
$razgon = $_POST['razgon'];
$color = $_POST['color'];
$price = $_POST['price'];

echo '<pre>';
print_r($_FILES);
echo '</pre>';
$path = 'imgcar/' . $_FILES['imgconfig']['name'];
if (!move_uploaded_file($_FILES['imgconfig']['tmp_name'], '../' . $path)) {
  $_SESSION['message'] = 'Ошибка при загрузке изображения';
  header('Location: ../form1.php');
  exit();
}

$sql = "INSERT INTO `configuration` (`ID_config`, `ID_car`,`config`,`ID_bodywork`, `year`, `country`, `engine`, `kb`, `drive`, `fuel`, `razgon`, `color`,`imgconfig`,`price`) 
VALUES ('$ID_config', '$cID_car','$cconfig','$ID_bodywork', '$year', '$country', '$engine', '$kb', '$drive', '$fuel','$razgon', '$color','$path','$price')";

if (mysqli_query($connect, $sql)) {
  header('Location: ../formc.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}
mysqli_close($connect);
//header('Location: ../form.php');