<?php
session_start();
require_once 'vendor/connect.php';


if (!$_SESSION['user']) {
    header('Location: /shop/auth.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Carling</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assoc/css/normalize.css">
    <link rel="stylesheet" href="assoc/css/formadmin.css">
    <title>Document</title>

</head>

<body>
    <header class="header">
        <!-- для копирования-->
        <div class="container">
            <div class="hc_inner">
                <div class="header_logo">
                    <a href="index.php">
                        <img src="img/logo50.svg" alt="">
                    </a>
                    <a href="index.php" class="hl">Carling</a>
                </div>
                <nav class="menu">
                    <ul>
                        <li class="header_btn"><a href="index.php#back">Каталог</a></li>
                        <?php
                        if (!$_SESSION['user']) {
                        ?>
                            <li class="header_auth"><a href="auth.php">Войти</а>
                                <?php
                            } else if ($_SESSION['user']['name'] == 'admin') {
                                ?>
                            <li class="header_btn"> <a href="profile.php"> <?= $_SESSION['user']['name'] ?></a></li>
                            <li class="header_btn"><a href="form1.php"><img src="img/newcar.svg" alt=""></a></li>

                        <?php
                            } else if ($_SESSION['user']['name'] != 'admin') { ?>
                            <li class="header_btn"><a href="pfbasket.php">Корзина</a></li>
                            <li class="header_btn"> <a href="profile.php"> <?= $_SESSION['user']['name'] ?></a></li>

                        <?php
                            }
                        ?>

                    </ul>
                </nav>
                <nav class="min_menu">
                    <ul>
                        <li class="header_btn1"><a href="index.php#back"><img src="img/carw.svg" alt=""></a></li>
                        <li class="header_btn2"><a href="pfbasket.php"><img src="img/basket.svg" alt=""></a></li>
                        <li class="header_auth2"><a href="auth.php"><img src="img/user.svg" alt=""></а>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div>
        <div class="container">
            <table>
                <tr>
                    <th>users</th>
                    <th>marka</th>
                    <th>model</th>
                    <th>config</th>
                    <th>priice</th>
                    <th>ID_config</th>
                    <th></th>
                </tr>
                <?php
                $user = $_SESSION['user']['id'];
                $users = mysqli_query($connect, "SELECT *  FROM `users` WHERE `ID_users` = '$user'");
                $users = mysqli_fetch_assoc($users);

                $basket = mysqli_query($connect, "SELECT c.marka, c.model, cn.config, cn.price, b.ID_basket, b.ID_config FROM car AS c JOIN configuration AS cn ON c.ID_car = cn.ID_car JOIN basket AS b ON b.ID_config = cn.ID_config WHERE b.ID_users = $user");
                if (mysqli_num_rows($basket) > 0) {
                    while ($bass = mysqli_fetch_assoc($basket)) {
                        /*echo "<pre>";
                        var_dump($bass);
                        echo "</pre>";*/
                ?>

                        <tr>
                            <td><?= $users['name'] ?></td>
                            <td><?= $bass['marka'] ?></td>
                            <td><?= $bass['model'] ?></td>
                            <td><?= $bass['config'] ?></td>
                            <td><?= $bass['price'] ?></td>
                            <td><a href="tovar.php?ID_config=<?= $bass['ID_config'] ?>">машина</a></td>
                            <td><a href="vendor/delete.php?idb=<?= $bass['ID_basket'] ?>"><img src="img/close.svg"></a></td>
                        </tr>

                <?php
                    }
                } else {
                    echo ' В вашей корзине ничего нет';
                    var_dump($basket);
                }
                ?>
            </table>
            <a href="vendor/email.php">
                <div class="car_cost_button">
                    <p>Отправить на почту</p>
                </div>
            </a>
            <?php
            if ($_SESSION['message']) {
                echo '<p class="msg" id="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
            ?>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="hc_inner">
                <div class="header_logo">
                    <a href="index.php">
                        <img src="img/logo50.svg" alt="">
                    </a>
                    <a href="index.php" class="hl">
                        Carling
                    </a>
                </div>
                <span class="span">Купи автомобиль своей мечты</span>
            </div>
        </div>
    </footer>
</body>

</html>