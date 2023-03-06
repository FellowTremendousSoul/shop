<?php
session_start();
require_once 'vendor/connect.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Carling</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assoc/css/normalize.css">
  <link rel="stylesheet" href="assoc/css/style.css">
</head>

<body>
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
            <li class="header_btn1"><a href="#back"><img src="img/carw.svg" alt=""></a></li>
            <li class="header_btn2"><a href="pfbasket.php"><img src="img/basket.svg" alt=""></a></li>
            <li class="header_auth2"><a href="auth.php"><img src="img/user.svg" alt=""></а>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!--крнец шапки-->
    <section class="bcg">
      <div class="container">
        <div class="offer">
          <div class="offer_title">
            Купите свою<br>мечту
          </div>
          <div class="offer_text">
            Новые автомобили от напрямую от официальных дилеров
          </div>
          <div class="offer_btn">
            <a href="#back"><img src="img/1/back.svg"></a>
          </div>
        </div>
      </div>
    </section>
  </header>
  <div class="of">
    <div class="container">
      <div class="offer-min">
        <div class="offer_title">
          Купите свою<br>мечту
        </div>
        <div class="offer_text">
          Новые автомобили от напрямую от официальных дилеров
        </div>
      </div>
    </div>
  </div>
  <section class="about1">
    <div class="container">
      <div class="about">
        <div class="box">
          <img class="box_img" src="img/1/car.svg" alt="">
          <div class="box_text">Лучшие<br> автомобили</div>
        </div>
        <div class="box">
          <img class="box_img" src="img/1/money.svg" alt="">
          <div class="box_text">Лучшие<br> цены
          </div>
        </div>
        <div class="box">
          <img class="box_img" src="img/1/offer.svg" alt="">
          <div class="box_text">Лучшие<br>предложения
          </div>
        </div>
      </div>
    </div>
  </section>
  <main class="container">
    <div class="main_title" id="back">Автомобили в наличии</div>
    <div class="main_items">
      <div class="main_box">
        <div class="main_img">
          <a href="marka.php?marka=audi"><img src="img/1/audi.png" alt=""></a>
        </div>
        <div class="main_name"><a href="marka.php?marka=audi">Audi</a></div>
      </div>
      <div class="main_box">
        <div class="main_img">
          <a href="marka.php?marka=bentley"><img src="img/1/bentley.png" alt=""></a>
        </div>
        <div class="main_name"><a href="marka.php?marka=bentley">Bentley</a></div>
      </div>
      <div class="main_box">
        <div class="main_img">
          <a href="marka.php?marka=bmw"><img src="img/1/bmw.png" alt=""></a>
        </div>
        <div class="main_name"><a href="marka.php?marka=bmw">BMW</a></div>
      </div>
      <div class="main_box">
        <div class="main_img">
          <a href="marka.php?marka=chevrolet"><img src="img/1/chevrolet.png" alt=""></a>
        </div>
        <div class="main_name"><a href="marka.php?marka=chevrolet">Chevrolet</a></div>
      </div>
      <div class="main_box">
        <div class="main_img">
          <a href="marka.php?marka=ferrari"><img src="img/1/ferrari.png" alt=""></a>
        </div>
        <div class="main_name"><a href="marka.php?marka=ferrari">Ferreri</a></div>
      </div>
      <div class="main_box">
        <div class="main_img">
          <a href="marka.php?marka=hyundai"><img src="img/1/hyundai.png" alt=""></a>
        </div>
        <div class="main_name"><a href="marka.php?marka=hyundai">Hyundai</a></div>
      </div>
      <div class="main_box">
        <div class="main_img">
          <a href="marka.php?marka=jaguar"><img src="img/1/jaguar.png" alt=""></a>
        </div>
        <div class="main_name"><a href="marka.php?marka=jaguar">Jagur</a></div>
      </div>
      <div class="main_box">
        <div class="main_img">
          <a href="marka.php?marka=jeep"><img src="img/1/jeep.png" alt=""></a>
        </div>
        <div class="main_name"><a href="marka.php?marka=jeep">Jeep</a></div>
      </div>
      <div class="main_box">
        <div class="main_img">
          <a href="marka.php?marka=kia"><img src="img/1/kia.png" alt=""></a>
        </div>
        <div class="main_name"><a href="marka.php?marka=kia">KIA</a></div>
      </div>
      <div class="main_box">
        <div class="main_img">
          <a href="marka.php?marka=lamborghini"><img src="img/1/lamborghini.png" alt=""></a>
        </div>
        <div class="main_name"><a href="marka.php?marka=lamborghini">Lamborghini</a></div>
      </div>
      <div class="main_box">
        <div class="main_img">
          <a href="marka.php?marka=land rover"><img src="img/1/landrover.png" alt=""></a>
        </div>
        <div class="main_name"><a href="marka.php?marka=land rover">Land Rover</a></div>
      </div>
      <div class="main_box">
        <div class="main_img">
          <a href="marka.php?marka=lexus"><img src="img/1/lexus.png" alt=""></a>
        </div>
        <div class="main_name"><a href="marka.php?marka=lexus">Lexus</a></div>
      </div>
      <div class="main_box">
        <div class="main_img">
          <a href="marka.php?marka=porsche"><img src="img/1/porsche.png" alt=""></a>
        </div>
        <div class="main_name"><a href="marka.php?marka=porsche">Porsche</a></div>
      </div>
    </div>
  </main>
  <div class="box_text_stat">
    <div class="container">
      <div class="text_stat">
        Наш сайт Carling предлагает выбрать и купить новый автомобиль у официального дилера без длительного поиска по всем автосалонам города. У нас есть множество марок как бюджетного сегмента как kia, Hyundai, так же и премиального Mercedes Benz, Porsche и тд.<br>
        Цены автомобилей уже представлены со всеми скидками от официального дилера марки.<br>
        На вопрос «где же купить машину» мы даем однозначный ответ и предлагаем помощь нашего колл-центр,а где всегда подскажут с выбором автомобиля и ответят на все ваши вопросы.
        Carling это один из крупнейших агрегаторов машин, в Москве. Мы работаем с большим количеством автомобильных дилеров по Москве и Московской области.
        У него удобный и понятный интерфейс. Мы постоянно развиваемся и предлагаем все больше функций своим клиентам.
      </div>
    </div>
  </div>

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