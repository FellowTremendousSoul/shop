<?php

session_start();
require_once 'connect.php';


$name = $_POST['name'];
$login = $_POST['login'];
$pass = $_POST['pass'];
$pass_confirm = $_POST['pass_confirm'];




$_SESSION['name'] = $name;
$_SESSION['login'] = $login;
$_SESSION['pass'] = $pass;
$_SESSION['pass_confirm'] = $pass_confirm;


$data = $_POST;
if (isset($data['do_signup'])) {
    if (trim($name) == '') {
        $_SESSION['message'] = 'Введите ФИО!';
        header('Location: ../register.php');
        exit();
    } else if (trim($login) == '') {
        $_SESSION['message'] = 'Введите логин!';
        header('Location: ../register.php');
        exit();
    } else if ($pass == '') {
        $_SESSION['message'] = 'Введите пароль!';
        header('Location: ../register.php');
        exit();
    } else if ($pass != $pass_confirm) {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
        exit();
    }

    $result = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['message'] = 'Такой пользователь уже существует';
        header('Location: ../register.php');
        exit();
    } else {
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        mysqli_query($connect, "INSERT INTO `users` (`name`, `login`, `passh`) VALUES ( '$name', '$login', '$pass')");

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../auth.php');

        mysqli_close($connect);
    }
}
