<?php
require_once 'connect.php';

$id1 = $_GET['id1'];
$idс = $_GET['idс'];
$idb = $_GET['idb'];

//var_dump($_GET);

if (!empty($id1)) {
  mysqli_query($connect, "DELETE FROM `car` WHERE `car`.`ID_car` = '$id1'");
  header('Location: ../form1.php');
  exit();
} else if (!empty($idc)) {
  mysqli_query($connect, "DELETE FROM `configuration` WHERE `configuration`.`ID_config` = '$idс'");
  header('Location: ../formc.php');
  exit();
} else if (!empty($idb)) {
  mysqli_query($connect, "DELETE FROM `basket` WHERE `basket`.`ID_basket` = '$idb'");
  header('Location: ../pfbasket.php');
  exit();
}
