<?php
session_start();

if (!$_SESSION['user']) {
    header('Location: /shop/auth.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Личный кабинет</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assoc/css/normalize.css">
    <link rel="stylesheet" href="assoc/css/profil.css">
</head>

<body>
    <div class="rod">
        <!-- Профиль -->
        <header class="header">
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
                            if ($_SESSION['user']['name'] == 'admin') {
                            ?>
                                <li class="header_btn"> <a> <?= $_SESSION['user']['name'] ?></a></li>
                                <li class="header_btn"><a href="form1.php"><img src="img/newcar.svg" alt=""></a></li>
                            <?php
                            } else {
                            ?>
                                <li class="header_btn"><a href="pfbasket.php">Корзина</a></li>
                                <li class="header_btn"> <a> <?= $_SESSION['user']['name'] ?></a></li>
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
        <section>
            <div class="container">
                <div class="admin">
                    <?php
                    if ($_SESSION['user']['name'] == 'admin') {
                    ?>
                        <p>Привествуем Администратор!</p>
                        <p>
                            Внести новый <a href="form1.php">автомобиль =></a>
                        </p>
                </div>
                <div class="user">
                <?php
                    } else {
                ?>
                    <span class="title">Привествуем <?= $_SESSION['user']['name'] ?>.</span>
                    <p>
                        <a href="/shop/pfbasket.php">Корзина</a>!
                    </p>
                <?php
                    }
                ?>
                </div>
                <form>
                    <a href="vendor/logout.php" class="logout">Выход</a>
                </form>
            </div>
        </section>

        <footer>
            <div class="container">
                <div class="hc_inner">
                    <div class="header_logo">
                        <a href="index.php">
                            <img src="img/logo50.svg" alt="">
                        </a>
                        <a href="index.php" class="hl">Carling</a>
                    </div>
                    <span>Купи автомобиль своей мечты</span>
                </div>
            </div>
        </footer>

    </div>
</body>

</html>