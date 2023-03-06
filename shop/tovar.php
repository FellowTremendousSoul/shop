<?php
session_start();
require_once 'vendor/connect.php';
$ID_config = $_GET['ID_config'];
/*echo '<pre>'; //- передача айди
var_dump($ID_config);
echo '</pre>';*/

$config = mysqli_query($connect, "SELECT * FROM `configuration` WHERE `ID_config`= '$ID_config'");
$config = mysqli_fetch_assoc($config);
$ID_car = $config['ID_car'];
/*echo '<pre>';
print_r($config); // - из БД комлекция
echo '<pre>';*/

$ID_bodywork = $config['ID_bodywork']; // -для названия 
$bodywork = mysqli_query($connect, "SELECT * FROM `bodywork`  WHERE `ID_bodywork` = $ID_bodywork");
$bodywork = mysqli_fetch_assoc($bodywork);
/*echo '<pre>';
print_r($bodywork); //-проверка 
echo '<pre>';*/
$res = mysqli_query($connect, "SELECT * FROM `car` WHERE `ID_car`='$ID_car'");
$res = mysqli_fetch_assoc($res);
$marka = $res['marka'];
$model = $res['model'];
$_GET['model'] = $model;
$_GET['marka'] = $marka;
/*echo '<pre>';
var_dump($_GET); //- для переключения страниц маленькое меню
echo '</pre>';*/
/*echo '<pre>';
print_r($res); //- БД модель 
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
              <li class="header_btn"><a href="/shop/pfbasket.php">Корзина</a></li>
              <li class="header_btn"> <a href="profile.php"> <?= $_SESSION['user']['name'] ?></a></li>

            <?php
              }
            ?>

          </ul>
        </nav>
        <nav class="min_menu">
          <ul>
            <li class="header_btn1"><a href="index.php#back"><img src="img/carw.svg" alt=""></a></li>
            <li class="header_btn2"><a href="/shop/pfbasket.php"><img src="img/basket.svg" alt=""></a></li>
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
          <a href="marka.php?marka=<?= $_GET['marka'] ?>"><?= $res['marka'] ?></a>/<a href="model.php?ID_car=<?= $res['ID_car'] ?>"><?= $res['model'] ?></a>

        <?php
        } /* ! - дописать ссылки на остальные марки */
        ?>
      </div>
      <div class="title_tovar">
        <?= $res['marka'] ?> <?= $res['model'] ?> <?= $config['config'] ?> (<?= $bodywork['bodywork'] ?>)
      </div>
      <div class="car">
        <div class="car_img">
          <img src="<?= $config['imgconfig'] ?>" alt="">
        </div>
        <div class="car_cost">
          <div class="car_cost_price">
            <p class="car_cost_price_cen">Цена</p><span><?= $config['price'] ?> ₽</span>
          </div>
          <a href="vendor/basket.php?ID_config=<?= $_GET['ID_config'] ?>">
            <div class="car_cost_button">
              <p>Забронировать</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </main>
  <section class="property">
    <div class="container">
      <div class="property_title">Характеристики</div>
      <div class="property_one">
        <div class="property_one_img">
          <img src="img/tovar/engine.svg" alt="">
        </div>
        <div class="property_one_div">
          <div class="pr_one_div_title">Двигатель</div>
          <div class="pr_one_div_text"><?= $config['engine'] ?></div>
        </div>
      </div>
      <div class="property_one">
        <div class="property_one_img">
          <img src="img/tovar/kb.svg" alt="">
        </div>
        <div class="property_one_div">
          <div class="pr_one_div_title">Коробка передач</div>
          <div class="pr_one_div_text"><?= $config['kb'] ?></div>
        </div>
      </div>
      <div class="property_one">
        <div class="property_one_img">
          <img src="img/tovar/drive.svg" alt="">
        </div>
        <div class="property_one_div">
          <div class="pr_one_div_title">Привод</div>
          <div class="pr_one_div_text"><?= $config['drive'] ?></div>
        </div>
      </div>
      <div class="property_one">
        <div class="property_one_img">
          <img src="img/tovar/fuel.svg" alt="">
        </div>
        <div class="property_one_div">
          <div class="pr_one_div_title">Расход топлива</div>
          <div class="pr_one_div_text"><?= $config['fuel'] ?></div>
        </div>
      </div>
      <div class="property_one">
        <div class="property_one_img">
          <img src="img/tovar/razgon.svg" alt="">
        </div>
        <div class="property_one_div">
          <div class="pr_one_div_title">Разгон до 100 км/ч, с</div>
          <div class="pr_one_div_text"><?= $config['razgon'] ?></div>
        </div>
      </div>
      <div class="property_one">
        <div class="property_one_img">
          <img src="img/tovar/color.svg" alt="">
        </div>
        <div class="property_one_div">
          <div class="pr_one_div_title">Цвет</div>
          <div class="pr_one_div_text"><?= $config['color'] ?></div>
        </div>
      </div>
      <div class="property_one">
        <div class="property_one_img">
          <img src="img/tovar/year.svg" alt="">
        </div>
        <div class="property_one_div">
          <div class="pr_one_div_title">Год выпуска</div>
          <div class="pr_one_div_text"><?= $config['year'] ?></div>
        </div>
      </div>
      <div class="property_one">
        <div class="property_one_img">
          <img src="img/tovar/country.svg" alt="">
        </div>
        <div class="property_one_div">
          <div class="pr_one_div_title">Страна марки</div>
          <div class="pr_one_div_text"><?= $config['country'] ?></div>
        </div>
      </div>
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

</body>

</html>