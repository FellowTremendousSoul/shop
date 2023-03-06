<?php
session_start();
require_once 'vendor/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Регистрация комплектации </title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assoc/css/normalize.css">
    <link rel="stylesheet" href="assoc/css/formadmin.css">
</head>

<body>
    <!-- Форма комплектации -->
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
                <a id="expand-btn" href="form1.php">Зарегистрировать автомобиль</a>
                <input type="checkbox" id="isexpanded">
                <label for="isexpanded" id="expand-btn">Зарегистрировать комплектацию</label>
                <div class="formcon">
                    <form action="vendor/formconfig.php" method="post" enctype="multipart/form-data" id="config">
                        <div class="form_title">Регистрация<br> комплектации
                        </div>
                        <div class="form_input">
                            <label>ID комплектациии</label>
                            <input type="text" name="ID_config" placeholder="Введите ID">
                        </div>
                        <div class="form_input">
                            <!--<input type="text" name="cID_car" placeholder="Введите ID">-->
                            <label>ID машины</label>
                            <?php
                            $cid = mysqli_query($connect, "SELECT *  FROM `car` ");
                            ?>
                            <select form="config" name="cID_car" required>
                                <option value="">Выберите Комплектацию</option>
                                <?php
                                while ($ccn = mysqli_fetch_assoc($cid)) {
                                ?>
                                    <option value="<?= $ccn['ID_car'] ?>"><?= $ccn['ID_car'] ?>-<?= $ccn['marka'] ?>-<?= $ccn['model'] ?>-<?= $ccn['config'] ?></option>
                                <?php

                                }
                                ?>
                            </select>
                        </div>
                        <div class="form_input">
                            <label>ID комплектациии</label>
                            <input type="text" name="cconfig" placeholder="Введите Комплектацию">
                        </div>
                        <div class="form_input">
                            <label>Кузов</label>
                            <?php
                            $cbody = mysqli_query($connect, "SELECT *  FROM `bodywork` ");
                            ?>
                            <select form="config" name="сID_bodywork" required>
                                <option value="">Выберите Кузов</option>
                                <?php
                                while ($body = mysqli_fetch_assoc($cbody)) {
                                ?>
                                    <option value="<?= $body['ID_bodywork'] ?>"><?= $body['bodywork'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form_input">
                            <label>Год изготовления</label>
                            <input type="text" name="year" placeholder="Введите год">
                        </div>
                        <div class="form_input">
                            <label>Страна произволителя</label>
                            <input type="text" name="country" placeholder="Введите страну">
                        </div>
                        <div class="form_input">
                            <label>Характеристики двигателя</label>
                            <input type="text" name="engine" placeholder="Введите хр: ... , 0.0, 0 л.с.">
                        </div>
                        <div class="form_input">
                            <label>Характеристики коробки передач</label>
                            <input type="text" name="kb" placeholder="Введите хр: ..., .. ступеней">
                        </div>
                        <div class="form_input">
                            <label>Привод</label>
                            <input type="text" name="drive" placeholder="Введите привод">
                        </div>
                        <div class="form_input">
                            <label>Расход топлива</label>
                            <input type="text" name="fuel" placeholder="Введите расход топлива, в литрах">
                        </div>
                        <div class="form_input">
                            <label>Разгон до 100 км/ч</label>
                            <input type="text" name="razgon" placeholder="Введите разон, в сек">
                        </div>
                        <div class="form_input">
                            <label>Цвет автомобиля</label>
                            <input type="text" name="color" placeholder="Введите цвет">
                        </div>
                        <div class="form_input">
                            <label>Загрузить картинку - страницы</label>
                            <input type="file" name="imgconfig">
                        </div>
                        <div class="form_input">
                            <label>Цена</label>
                            <input type="text" name="price" placeholder="Введите цену автомобиля">
                        </div>
                        <div class="form_button">
                            <button type="submit" name="do_config">Внести</button>
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
        </div>
    </main>
    <table class='table_config'>
        <tr>
            <th>ID_config</th>
            <th>ID_car</th>
            <th>config</th>
            <th>ID_bodywork</th>
            <th>year</th>
            <th>country</th>
            <th>engine</th>
            <th>kb</th>
            <th>drive</th>
            <th>fuel</th>
            <th>razgon</th>
            <th>color</th>
            <th>imgconfig</th>
            <th>price</th>
            <th></th>
            <th></th>
        </tr>
        <?php
        $config = mysqli_query($connect, "SELECT *  FROM `configuration` ");
        if (mysqli_num_rows($config) > 0) {
            while ($row2 = mysqli_fetch_assoc($config)) {
        ?>
                <tr>
                    <td class="tc_td"><?= $row2['ID_config'] ?></td>
                    <td class="tc_td"><?= $row2['ID_car'] ?></td>
                    <td class="tc_td"><?= $row2['config'] ?></td>
                    <td class="tc_td"><?= $row2['ID_bodywork'] ?></td>
                    <td class="tc_td"><?= $row2['year'] ?></td>
                    <td class="tc_td"><?= $row2['country'] ?></td>
                    <td class="tc_td"><?= $row2['engine'] ?></td>
                    <td class="tc_td"><?= $row2['kb'] ?></td>
                    <td class="tc_td"><?= $row2['drive'] ?></td>
                    <td class="tc_td"><?= $row2['fuel'] ?></td>
                    <td class="tc_td"><?= $row2['razgon'] ?></td>
                    <td class="tc_td"><?= $row2['color'] ?></td>
                    <td class="tc_td"><?= $row2['imgconfig'] ?></td>
                    <td class="tc_td"><?= $row2['price'] ?></td>
                    <td class="tc_td"><a href="tovar.php?ID_config=<?= $row2['ID_config'] ?>">товар</a></td>
                    <td class="tc_td"><a href="vendor/delete.php?idс=<?= $row2['ID_config'] ?>"><img src="img/close.svg"></a> </td>
                </tr> <?php
                    }
                }
                        ?>
    </table>


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