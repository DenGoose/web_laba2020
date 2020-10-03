<!DOCTYPE html>
<html lang="en" class="back_img vigneette">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>Фильмотека</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />

    <link href="/assets/css/style.css" rel="stylesheet" />
</head>

<body class="text-center">
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand"><a href="/index.php"> Фильмотека </a></h3>
                <nav class="nav_nav">
                    <div class="nav nav-masthead_f">
                        <a class="nav-link active " href="/pages/filmes.php">Фильмы</a>
                        <!-- <a class="nav-link" href="/pages/clients.html">Клиенты</a> -->
                        <a class="nav-link" href="/pages/history.php">История</a>
                    </div>
                    <?php
                    if (empty($_COOKIE['user'])) :
                        ?>
                        <div class="nav nav-masthead">
                            <a class="btn btn-secondary" href="/pages/auth.html">Войти</a>
                            <a href="/pages/register.html" class="nav-link register">Регистрация</a>
                        </div>
                    <?php
                    else :
                        ?>
                        <div class="nav nav-masthead">
                            <p>Привет, <?= $_COOKIE['user'] ?>. <a href="/src/php/exit.php">Выйти</a></p>
                        </div>
                    <?php
                    endif;
                    ?>
                </nav>
            </div>
        </header>
        <main role="main" class="f_main back_text">
            <p>
                <h1 class="inner cover films">
                    Каталог фильмов и сериалов
                </h1>
            </p>
            <div class="container-fluid container row text-center justify-content">
                <div class="col-xs-12 col-lg-4">
                    <a href="#">
                        <img src="../assets/images/1.webp" class="f_img">
                        <p class="text_under">Матрица</p>
                    </a>
                </div>
                <div class="col-xs-12 col-lg-4">
                    <a href="#">
                        <img src="../assets/images/2.webp" class="f_img">
                        <p class="text_under">Поезд в Пусан 2: Полуостров</p>
                    </a>
                </div>
                <div class="col-xs-12 col-lg-4">
                    <a href="#">
                        <img src="../assets/images/3.webp" class="f_img">
                        <p class="text_under">Академия Амбрелла</p>
                    </a>
                </div>
            </div>
            <div class="container-fluid container row text-center justify-content">
                <div class="col-xs-12 col-lg-4">
                    <a href="#">
                        <img src="../assets/images/4.webp" class="f_img">
                        <p class="text_under">Аватар</p>
                    </a>
                </div>
                <div class="col-xs-12 col-lg-4">
                    <a href="#">
                        <img src="../assets/images/5.webp" class="f_img">
                        <p class="text_under">Игра в имитацию</p>
                    </a>
                </div>
                <div class="col-xs-12 col-lg-4">
                    <a href="#">
                        <img src="../assets/images/6.jpg" class="f_img">
                        <p class="text_under">Матрица: Революция</p>
                    </a>
                </div>
            </div>
            <div class="container-fluid container row text-center justify-content">
                <div class="col-xs-12 col-lg-4">
                    <a href="#">
                        <img src="../assets/images/7.webp" class="f_img">
                        <p class="text_under">Грань будущего</p>
                    </a>
                </div>
                <div class="col-xs-12 col-lg-4">
                    <a href="#">
                        <img src="../assets/images/8.webp" class="f_img">
                        <p class="text_under">Начало</p>
                    </a>
                </div>
                <div class="col-xs-12 col-lg-4">
                    <a href="#">
                        <img src="../assets/images/9.webp" class="f_img">
                        <p class="text_under">Очень странные дела</p>
                    </a>
                </div>
            </div>
            <div class="container-fluid container row text-center justify-content">
                <div class="col-xs-12 col-lg-4">
                    <a href="#">
                        <img src="../assets/images/10.webp" class="f_img">
                        <p class="text_under">Звёздные войны. Эпизод III: Месть ситхов
                        </p>
                    </a>
                </div>
                <div class="col-xs-12 col-lg-4">
                    <a href="#">
                        <img src="../assets/images/11.png" class="f_img">
                        <p class="text_under">Звёздный путь: Пикар</p>
                    </a>
                </div>
                <div class="col-xs-12 col-lg-4">
                    <a href="#">
                        <img src="../assets/images/12.webp" class="f_img">
                        <p class="text_under">Телохранитель киллера</p>
                    </a>
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