<?php
session_start();

$id = 10;

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
                        <a class="nav-link" href="/pages/filmes.php">Фильмы</a>
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
                        <a class="nav-link" href="/pages/filmes.php">Фильмы</a>
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

