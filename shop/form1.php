<?php
session_start();
require_once 'vendor/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Регистрация автомобиля</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assoc/css/normalize.css">
    <link rel="stylesheet" href="assoc/css/formadmin.css">
</head>

<body>
    <!-- Форма машины -->
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
                            <li class="header_btn"> <a href="profile.php"> <?= $_SESSION['user']['name'] ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>

        <div class="container">
            <div class="input">
                <a id="expand-btn" href="formc.php">Зарегистрировать комплектацию</a>
                <input type="checkbox" id="isexpanded">
                <label for="isexpanded" id="expand-btn">Зарегистрировать автомобиль</label>
                <div class="formcon">
                    <form action="vendor/formcar.php" method="post" enctype="multipart/form-data" id="config">
                        <div class="form_title">Регистрация<br> автомобиля
                        </div>
                        <div class="form_input">
                            <label>ID машины</label>
                            <input type="text" name="ID_car" placeholder="Введите ID">
                        </div>
                        <div class="form_input">
                            <label>Марка</label>
                            <input type="text" name="marka" placeholder="Введите марку ">
                        </div>
                        <div class="form_input">
                            <label>Загрузить картинку - марки(imgmarka)</label>
                            <input type="file" name="imgmarka">
                        </div>
                        <div class="form_input">
                            <label>Модель</label>
                            <input type="text" name="model" placeholder="Введите модель">
                        </div>
                        <div class="form_input">
                            <label>Загрузить картинку - страницы(imgcar)</label>
                            <input type="file" name="imgcar">
                        </div>
                        <!--<div class="form_input">
                            <label>Комплектация</label>
                            <input type="text" name="config" placeholder="Введите название комплектации">
                        </div>-->
                        <div class="form_input">
                            <label>Цена</label>
                            <input type="text" name="price" placeholder="Введите цену автомобиля">
                        </div>
                        <div class="form_input">
                            <label>Загрузить картинку - модели(img)</label>
                            <input type="file" name="img">
                        </div>
                        <div class="form_button">
                            <button type="submit">Внести</button>

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

            <table class="table_car">
                <tr>
                    <th>ID_car</th>
                    <th>marka</th>
                    <th>imgmarka</th>
                    <th>model</th>
                    <th>imgcar</th>
                    <th>price</th>
                    <th>img</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                $car = mysqli_query($connect, "SELECT *  FROM `car` ");
                if (mysqli_num_rows($car) > 0) {
                    while ($row = mysqli_fetch_assoc($car)) {
                ?>
                        <tr>
                            <td><?= $row['ID_car'] ?></td>
                            <td><?= $row['marka'] ?></td>
                            <td><?= $row['imgmarka'] ?></td>
                            <td><?= $row['model'] ?></td>
                            <td><?= $row['imgcar'] ?></td>
                            <td><?= $row['price'] ?></td>
                            <td><?= $row['img'] ?></td>
                            <td><a href="model.php?ID_car=<?= $row['ID_car'] ?>?>">товар</a></td>
                            <td><a href="vendor/delete.php?id1=<?= $row['ID_car'] ?>"><img src="img/close.svg"></a> </td>
                        </tr>
                <?php
                    }
                    echo "<pre>";
                    print_r($row);
                    echo "</pre>";
                } else {
                    var_dump($car);
                }
                ?>
            </table>
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