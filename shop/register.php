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
    <title>Регистрация</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assoc/css/normalize.css">
    <link rel="stylesheet" href="assoc/css/forma.css">
</head>

<body>
    <!-- Форма регистрации -->
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
                        <li class="header_btn"><a href="pfbasket.php">Корзина</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="form">
                <form action="vendor/signup.php" method="post">
                    <div class="form_title">Регистрация
                    </div>
                    <div class="form_input">
                        <label>ФИО</label>
                        <input type="text" name="name" placeholder="Введите свое полное имя " value="<?php echo @$_SESSION['name']; ?>">
                    </div>
                    <div class="form_input">
                        <label>Логин</label>
                        <input type="text" name="login" placeholder="Введите свой логин" value="<?php echo @$_SESSION['login']; ?>">
                    </div>
                    <div class="form_input">
                        <label>Пароль</label>
                        <input type="password" name="pass" placeholder="Введите пароль">
                    </div>
                    <div class="form_input">
                        <label>Подтверждение пароля</label>
                        <input type="password" name="pass_confirm" placeholder="Подтвердите пароль">
                    </div>
                    <div class="form_button">
                        <button type="submit" name="do_signup">Зарегистрироваться</button>
                        <p>
                            У вас уже есть аккаунт? - <a href="/shop/auth.php">Aвторизируйтесь</a>!
                        </p>
                        <?php
                        if ($_SESSION['message']) {
                            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
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