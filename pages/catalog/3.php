<?php
session_start();

$id = 3;

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
            <?= $name ?> (сериал)
        </h1>
        <div class="container-fluid container row text-center justify-content">
            <div class="col-xs-12 col-lg-6">
                <img src="../../assets/images/3.webp">
            </div>
            <div class="col-xs-12 col-lg-6">
                <p>
                    Расформированная группа супергероев воссоединяется после смерти своего приемного отца, который готовил их к спасению мира от неизвестной угрозы. Вместе они должны продолжить его дело.
                </p>
                <p style="font-weight: bold">О фильме</p>
                <table class="table table-hover">
                    <tbody>
                    <tr class="text-white">
                        <td>Год производства</td>
                        <td>2019-...</td>
                    </tr>
                    <tr class="text-white">
                        <td>Страна</td>
                        <td>США, Канада</td>
                    </tr>
                    <tr class="text-white">
                        <td>Жанр</td>
                        <td>фантастика, фэнтези, боевик, драма, комедия, приключения</td>
                    </tr>
                    <tr class="text-white">
                        <td>Слоган</td>
                        <td>«Super Strong»</td>
                    </tr>
                    <tr class="text-white">
                        <td>Режиссер</td>
                        <td>Эллен Кёрас, Стивен Серджик, ...</td>
                    </tr>
                    <tr class="text-white">
                        <td>Премьера в Росcии</td>
                        <td>-</td>
                    </tr>
                    <tr class="text-white">
                        <td>Премьера в мире</td>
                        <td>15 февраля 2019, ...</td>
                    </tr>
                    </tbody>
                </table>
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

