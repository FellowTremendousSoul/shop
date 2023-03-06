<?php
session_start();
require_once 'vendor/connect.php';
$marka = $_GET['marka'];
/*echo '<pre>'; //- передает от марки айди 
var_dump($marka);
echo '</pre>';*/
$sql = "SELECT * FROM `car` WHERE `marka`= '$marka'";
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
      </div>
      <div class="the_brand">
        <?php
        $logo = mysqli_query($connect, $sql);
        $log = mysqli_fetch_assoc($logo);
        ?>
        <img src="<?= $log['imgmarka'] ?>" alt="">
      </div>
      <div class="models_title">Модельный ряд</div>
      <div class="models">
        <?php
        $result = mysqli_query($connect, $sql);
        while ($audi = mysqli_fetch_assoc($result)) {
          /*echo '<pre>';
          var_dump($audi);
          echo '</pre>';*/
        ?>
          <div class="model">
            <div class="model_img">
              <a href="model.php?ID_car=<?= $audi['ID_car'] ?>">
                <img src="<?= $audi['img'] ?>" alt=""></a>
            </div>
            <div class="model_name">
              <?= $audi['marka'] ?> <?= $audi['model'] ?>
            </div>
            <div class="model_price">
              от <?= $audi['price'] ?> ₽
            </div>
            <div class="model_link">
              <a href="model.php?ID_car=<?= $audi['ID_car'] ?>"><img src="img/model_link.svg" alt=""></a>
            </div>
          </div>
        <?php
        }
        ?>
        <!--models-->
      </div>
      <!--container-->
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