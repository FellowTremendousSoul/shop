<?php

session_start();
require_once 'connect.php';



$data = $_POST;
if (isset($data['do_login'])) {
    $login = trim($_POST['login']);
    $pass = $_POST['pass'];


    $check_staff = mysqli_query($connect, "SELECT * FROM `staff` WHERE `login` = '$login'");
    if (mysqli_num_rows($check_staff) > 0) {


        $user = mysqli_fetch_assoc($check_staff);

        /*echo "<pre>";
        var_dump($user);
        echo "</pre>";*/

        if ($login == $user['login'] and $pass == $user['pass']) {

            $_SESSION['user'] = [
                "id" => $user['id'],
                "name" => $user['name'],

            ];
            mysqli_close($connect);

            header('Location: ../profile.php');
        } else {
            $_SESSION['message'] = 'Пароль введен не верно';
            header('Location: ../auth.php');
        }
    } else {

        $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
        if (mysqli_num_rows($check_user) > 0) {

            $user = mysqli_fetch_assoc($check_user);

            if ($login == $user['login']) {

                if (password_verify($pass, $user['passh'])) {
                    //print_r('ok');
                    $_SESSION['user'] = [
                        "id" => $user['ID_users'],
                        "name" => $user['name'],

                    ];
                    mysqli_close($connect);

                    header('Location: ../profile.php');
                } else {
                    $_SESSION['message'] = 'Пароль введен не верно';
                    header('Location: ../auth.php');
                }
                //}else{
                //print_r("неработает со счетчиком пароля ");
                //}
            } else {
                print_r("неработает с логином ");
            }
        } else {
            $_SESSION['message'] = 'Такой пользователь не найден ';
            header('Location: ../auth.php');
        }
    }
}
