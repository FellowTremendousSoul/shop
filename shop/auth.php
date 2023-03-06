<?php
session_start();
if ($_SESSION['user']) {
    header('Location: /shop/profile.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Авторизация</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assoc/css/normalize.css">
    <link rel="stylesheet" href="assoc/css/forma.css">
</head>

<body>
    <!-- Форма авторизации -->
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
                        <li class="header_btn"><a href="/pfbasket.php">Корзина</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="form">
                <form action="vendor/signin.php" method="post">
                    <div class="form_title">Авторизация
                    </div>
                    <div class="form_input">
                        <label>Логин</label>
                        <input type="text" name="login" placeholder="Введите логин" value="<?php echo @$_SESSION['login']; ?>">
                    </div>
                    <div class="form_input">
                        <label>Пароль</label>
                        <input type="password" name="pass" placeholder="Введите пароль">
                    </div>
                    <div class="form_button">
                        <button type="submit" name="do_login">Войти</button>

                        <p>
                            Нет аккаунта? - <a href="/shop/register.php"> Зарегистрируйтесь</a>!
                        </p>
                        <?php
                        if ($_SESSION['message']) {
                            echo '<p class="msg" id="msg"> ' . $_SESSION['message'] . ' </p>';
                        }
                        unset($_SESSION['message']);
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </main>
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
</body>

</html>