<?php
session_start();
require_once 'connect.php';
//require_once 'basket.php';

setcookie($name, $car_config, strtotime("+30 days"));
print_r($_COOKIE[$name]);
