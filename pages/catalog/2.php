<?php
session_start();

$id = 2;

if (!empty($_COOKIE['token']))
    if (!isset($_SESSION['token'])) {
        setcookie('user', '', time() - 3600, "/");
    } else {
        if ($_SESSION['token'] != $_COOKIE['token']) {
            unset($_SESSION['token']);
            setcookie('token', '', time() - 3600, "/");
            setcookie('user', '', time() - 3600, "/");
        }
    }
if (!empty($_COOKIE['token'])) {
    require_once '../../src/php/add_history.php';
    hit($_COOKIE['user'], $id);
}
$mysql = new mysqli('localhost', 'root', '', 'filmoteka');
$result = $mysql->query("SELECT name FROM fimes.film WHERE id='$id'");
$arr = $result->fetch_assoc();
$name = $arr['name'];
$mysql->close();
?>
<!DOCTYPE html>
<html lang="en" class="back_img vigneette">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <title>Фильмотека</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="/assets/images/icon.ico" type="image/ico">
    <link href="/assets/css/style.css" rel="stylesheet"/>
</head>

<body class="text-center">
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand"><a href="/index.php"> Фильмотека </a></h3>
            <nav class="nav_nav">


                <?php
                if (empty($_COOKIE['user'])) :
                    ?>
                    <div class="nav nav-masthead_f">
                        <a class="nav-link" href="/pages/filmes.php">Фильмы и сериалы</a>
                        <!-- <a class="nav-link" href="/pages/clients.html">Клиенты</a> -->
                    </div>
                    <div class="nav nav-masthead">
                        <a class="btn btn-secondary" href="/pages/auth.php">Войти</a>
                        <a href="/pages/register.php" class="nav-link register">Регистрация</a>
                    </div>
                <?php
                else :
                    ?>
                    <div class="nav nav-masthead_f">
                        <a class="nav-link" href="/pages/filmes.php">Фильмы и сериалы</a>
                        <!-- <a class="nav-link" href="/pages/clients.html">Клиенты</a> -->
                        <a class="nav-link" href="/pages/history.php">История</a>
                        <a class="nav-link" href="/pages/lk.php">Личный кабинет</a>
                    </div>
                    <div class="nav nav-masthead">
                        <p>Привет, <?= $_COOKIE['user'] ?>
                            &nbsp;
                            <a class="btn btn-secondary" href="/src/php/exit.php">Выйти</a>
                        </p>
                    </div>
                <?php
                endif;
                ?>
            </nav>
        </div>
    </header>
    <main role="main" class="f_main back_text">

        <h1 class="inner cover films">
            <?= $name ?>
        </h1>
        <div class="container-fluid container row text-center justify-content">
            <div class="col-xs-12 col-lg-6">
                <img src="../../assets/images/2.webp">
            </div>
            <div class="col-xs-12 col-lg-6">
                <?php
                require_once "../../src/php/rating.php";
                if (!empty($_COOKIE['user'])) {
                    if (!check_rating($_COOKIE['user'], $id)) {
                        ?>
                        <form method="post" class="rating-area">
                            <input type="radio" id="star-5" name="rating" value="5">
                            <label for="star-5" title="Оценка «5»"></label>
                            <input type="radio" id="star-4" name="rating" value="4">
                            <label for="star-4" title="Оценка «4»"></label>
                            <input type="radio" id="star-3" name="rating" value="3">
                            <label for="star-3" title="Оценка «3»"></label>
                            <input type="radio" id="star-2" name="rating" value="2">
                            <label for="star-2" title="Оценка «2»"></label>
                            <input type="radio" id="star-1" name="rating" value="1">
                            <label for="star-1" title="Оценка «1»"></label>
                            <button type="submit" class="btn">Отправить</button>
                        </form>
                        <?php
                        require_once "../../src/php/rating.php";
                        if (isset($_POST['rating'])) {
                            add_rating($_POST['rating'], $_COOKIE['user'], $id);
                            header("Refresh:0");
                        }
                    } else {
                        $num = check_rating($_COOKIE['user'], $id);
                        ?>
                        <h3 class="rate_text">Ваш рейтинг</h3>
                        <form method="post" class="rating-area" style="margin-bottom: 20px">
                            <input type="radio" id="star-5" name="rating"
                                   value="5" <?php if ($num == 5) echo "checked" ?>>
                            <label for="star-5" title="Оценка «5»"></label>
                            <input type="radio" id="star-4" name="rating"
                                   value="4" <?php if ($num == 4) echo "checked" ?>>
                            <label for="star-4" title="Оценка «4»"></label>
                            <input type="radio" id="star-3" name="rating"
                                   value="3" <?php if ($num == 3) echo "checked" ?>>
                            <label for="star-3" title="Оценка «3»"></label>
                            <input type="radio" id="star-2" name="rating"
                                   value="2" <?php if ($num == 2) echo "checked" ?>>
                            <label for="star-2" title="Оценка «2»"></label>
                            <input type="radio" id="star-1" name="rating"
                                   value="1" <?php if ($num == 1) echo "checked" ?>>
                            <label for="star-1" title="Оценка «1»"></label>
                        </form>
                        <?php
                    }
                }
                ?>
                <div>
                    <h6 class="rate_text" ">Средний рейтинг по сайту</h6>
                    <h4 class="rate_film"><?php if (rating($id)!=0) echo round(rating($id), 2); else echo "Пока никто не голосовал";?></h4>
                </div>
                <h3 style="margin-top: 40px; margin-bottom: 20px;">Краткое описание</h3>
                <p>
                    Постапокалиптическая охота за большими деньгами на территории зомби. Динамичный экшен, кровавые
                    ужасы
                </p>
                <p style="font-weight: bold">О фильме</p>
                <table class="table table-hover">
                    <tbody>
                    <tr class="text-white">
                        <td>Год производства</td>
                        <td>2020</td>
                    </tr>
                    <tr class="text-white">
                        <td>Страна</td>
                        <td>Корея Южная</td>
                    </tr>
                    <tr class="text-white">
                        <td>Жанр</td>
                        <td>ужасы, боевик</td>
                    </tr>
                    <tr class="text-white">
                        <td>Слоган</td>
                        <td>«Спастись от апокалипсиса»</td>
                    </tr>
                    <tr class="text-white">
                        <td>Режиссер</td>
                        <td>Ён Сан-хо</td>
                    </tr>
                    <tr class="text-white">
                        <td>Премьера в Росcии</td>
                        <td>20 августа 2020</td>
                    </tr>
                    <tr class="text-white">
                        <td>Премьера в мире</td>
                        <td>15 июля 2020</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-xs-12 col-lg-12" style="margin-top: 20px">
                <iframe width="960" height="540" src="https://www.youtube.com/embed/4D6GCbL2q2A" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>

        </div>

    </main>

    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>
                Created by Den_Goose & gromkosha ©
            </p>
        </div>
    </footer>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
</script>
</body>

</html>

