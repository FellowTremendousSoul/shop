<?php
session_start();
require_once 'connect.php';

/*setcookie("visit_count", 1, strtotime("+30 days")); //-счетчик посещений
//print_r($_COOKIE["visit_count"]);
$visit_count = 1;
if (isset($_COOKIE["visit_count"])) {
  $visit_count = $_COOKIE["visit_count"] + 1;
}
setcookie("visit_count", $visit_count, strtotime("+30 days"));
print("Количество посещений: " . $visit_count);*/


$ID_config = $_GET['ID_config'];
//var_dump($ID_config);

$user = $_SESSION['user']['id'];
//echo '<pre>';
//var_dump($_SESSION);
//echo '</pre>';

/*if (isset($ID_config)) { //- к куки эксперементы
  $name = $ID_config + 1;
}*/

/*$qeury_basket = mysqli_query($connect, "SELECT * FROM `configuration` WHERE `ID_config` = $ID_config");
if (mysqli_num_rows($qeury_basket) > 0) {
  while ($car_config = mysqli_fetch_assoc($qeury_basket)) {
    //echo '<pre>';
    //print_r($car_config);
    //echo '</pre>';
    setcookie($name, $car_config['config'], strtotime("+30 days"));
    var_dump($_COOKIE[$name]);
  }
  // header('Location: b1.php');

} else {
  echo ('ничего вам не выведим, потому что код писать нормально надо');
}*/


if (empty($ID_config)) { // - рабочая версия 
  echo 'плохо выводом айди';
} else {
  mysqli_query($connect, "INSERT INTO `basket` ( `ID_users`, `ID_config`) VALUES ('$user','$ID_config')");
  $_SESSION['mess'] = 'товар в корзину добавлен';
  mysqli_close($connect);
  header('Location: ../pfbasket.php');
}
  


  /* $basket = mysqli_query($connect, "SELECT *  FROM `basket` WHERE `ID_users` = '$user'");
   if (mysqli_num_rows($basket) > 0) {
    $basket2 = mysqli_fetch_array($basket);
    //print_r($basket2);
    echo"<pre>";
    var_dump($basket2);
    echo"</pre>";
   }else{
     var_dump($basket);
   }
*/
