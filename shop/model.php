<?php
session_start();
require_once 'vendor/connect.php';
$ID_car = $_GET['ID_car'];
/*echo '<pre>'; //- передача айди 
var_dump($ID_car);
echo '</pre>';*/
$result = mysqli_query($connect, "SELECT * FROM `car` WHERE `ID_car`='$ID_car'");
$res = mysqli_fetch_assoc($result);
$model = $res['model'];
$ID_car = $res['ID_car'];
/*echo '<pre>';
var_dump($res); //- определяет что вывело по айди
echo '<br>';
var_dump($model); // - проверка что предалось
echo '<br>';
var_dump($ID_car); // - проверка что предалось
echo '</pre>';*/
$marka = $res['marka'];
$_GET['marka'] = $marka;
/*echo '<pre>';
var_dump($_GET); // - проверка что предалось
echo '</pre>';*/



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Carling</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assoc/css/normalize.css">
  <link rel="stylesheet" href="assoc/css/marka.css">
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
  <main>
    <div class="container">
      <div class="link_title">
        <a href="index.php">Главная</a>/
        <?php
        if ($res['marka'] == $_GET['marka']) { ?>
          <a href="marka.php?marka=<?= $_GET['marka'] ?>"><?= $res['marka'] ?></a>/

        <?php
        }
        ?>
      </div>
      <div class="the_model">
        <img src="<?= $res['imgcar'] ?>" alt="">
      </div>
      <div class="models_title">Комплектации</div>
      <div class="config">
        <?php
        $comp = mysqli_query($connect, "SELECT DISTINCT `config` FROM `configuration` WHERE `ID_car`='$ID_car'");
        while ($com = mysqli_fetch_assoc($comp)) {
          $config = $com['config'];
          /*echo '<pre>';
          var_dump($com);
          var_dump($config);
          echo '</pre>';*/
        ?>
          <div class="models_name"><?= $config ?></div>
          <div class="models">
            <?php
            $pid = mysqli_query($connect, "SELECT * FROM `configuration` WHERE `config` = '$config'");
            while ($cid = mysqli_fetch_assoc($pid)) {
              /*echo '<pre>';
              var_dump($cid);
              echo '</pre>';*/
            ?>
              <div class="model">
                <div class="model_img">
                  <a href="tovar.php?ID_config=<?= $cid['ID_config'] ?>"><img src="<?= $cid['imgconfig'] ?>" alt=""></a>
                </div>
                <div class="model_name">
                  <?= $res['marka'] ?> <?= $res['model'] ?> <?= $cid['config'] ?>
                </div>
                <div class="model_price">
                  <?= $cid['price'] ?> ₽
                </div>
                <div class="model_link">
                  <a href="tovar.php?ID_config=<?= $cid['ID_config'] ?>"><img src="img/model_link.svg" alt=""></a>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        <?php
        }
        ?>
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