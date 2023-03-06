<?php
session_start();
require_once 'connect.php';

$to = "vika.abramova200272@gmail.com";
$subject = "Автомобили которые вы забранировали на сайте Carling ";

$user = $_SESSION['user']['id'];
/*$users = mysqli_query($connect, "SELECT *  FROM `users` WHERE `ID_users` = '$user'");
$users = mysqli_fetch_assoc($users);
var_dump($users);*/ //-для имени
//var_dump($user);
/*SELECT 
c.marka,
c.model,
cn.config,
cn.price
/*b.ID_users,
b.ID_config
FROM car AS c 
JOIN configuration AS cn ON c.ID_car = cn.ID_car
JOIN basket AS b ON b.ID_config = cn.ID_config
WHERE b.ID_users = '57'*/
$sql = "SELECT c.marka, c.model, cn.config, cn.price /*, b.ID_users,b.ID_config*/ FROM car AS c JOIN configuration AS cn ON c.ID_car = cn.ID_car JOIN basket AS b ON b.ID_config = cn.ID_config WHERE b.ID_users = $user";

$basket = mysqli_query($connect,  $sql);
//var_dump($basket);
if (mysqli_num_rows($basket) > 0) {
  while ($bass = mysqli_fetch_assoc($basket)) {
    $pr = " ";
    $st1[] =  $bass['marka'] . $pr . $bass['model'] . $pr . $bass['config'] . $pr . $bass['price'];
    //echo '<pre>';
    //print_r($st1);
    //echo '</pre>';
  }
}

//$result = array_merge($bass);
//print_r($result);
//echo '<br>';
//echo '<pre>';
foreach ($st1 as $key => $value) {
  //echo  $value, '<br>';
  $message = "$value\r\n";
  //echo $message, '<br>';

  $message = wordwrap($value, 70, "\r\n");
  //echo $message, '<br>';
  $retval = mail($to, $subject, $message/*, $header*/);
}

header('Location: ../pfbasket.php');
//print_r($st1[0]);
//echo '</pre>';

//$mess = implode(",", $st1);


//$message = "$st1\r\nLine 2\r\nLine 3";


// На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()




/*$header = "From:abc@somedomain.com \r\n";
$header .= "Cc:afgh@somedomain.com \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";*/



if ($retval == true) {
  $_SESSION['message'] = 'Писмо отправлено!';
  //header('Location: ../pfbasket.php');
  exit();
} else {
  $_SESSION['message'] = 'Письмо не отправлено!';
  //header('Location: ../pfbasket.php');
}

if ($_SESSION['message']) {
  echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';

  //var_dump($_SESSION);
}
unset($_SESSION['message']);
