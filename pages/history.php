<?php
session_start();
if (!isset($_SESSION['token'])) {
    setcookie('user', '', time() - 3600, "/");
    header('Location: /pages/auth.php');
    exit();
}
if ($_SESSION['token'] != $_COOKIE['token']) :
    setcookie('user', '', time() - 3600, "/");
    header('Location: /pages/auth.php');
    exit();
else:
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <title>Фильмотека</title>

        <!-- Bootstrap core CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/assets/css/style.css" rel="stylesheet"/>
    </head>
    <?php
    require_once '../src/php/views.php';
    if (arr() == -1){
        echo "<body class='text-center vigneette'>";
    }else{
        echo "<body class='text-center'>";
    }
    ?>
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand"><a href="/index.php"> Фильмотека </a></h3>
                <nav class="nav_nav">
                    <div class="nav nav-masthead_f">
                        <a class="nav-link " href="/pages/filmes.php">Фильмы и сериалы</a>
                        <!-- <a class="nav-link" href="/pages/clients.html">Клиенты</a> -->
                        <a class="nav-link active" href="/pages/history.php">История</a>
                        <a class="nav-link" href="/pages/lk.php">Личный кабинет</a>
                    </div>

        <div class="nav nav-masthead">
            <p>Привет, <?= $_COOKIE['user'] ?>
                &nbsp;
                <a class="btn btn-secondary" href="/src/php/exit.php">Выйти</a>
            </p>
        </div>
        </nav>
    </div>
    </header>

    <main role="main" class="inner cover back_text">
        <h1 class="cover-heading" style="margin-bottom: 50px">История просмотров</h1>
        <?php
        $arr = arr();
        if ($arr == -1) {
            echo "<p style='text-align: center'>Ваша история просмотров пуста</p>";
        } else {
            echo "<div class='container-fluid container row text-center justify-content'>";
            $N = count($arr);
            for ($i = 0; $i < $N; $i++) {
                ?>
                <div class="col-xs-12 col-lg-4">
                    <a href="/pages/catalog/<?= $arr[$i]['id'] ?>.php">
                        <img src="../assets/images/<?= $arr[$i]['id'] ?>.webp" class="f_img">
                        <p class="text_under"><?= $arr[$i]['name'] ?></p>
                    </a>
                </div>
                <?php
            }
            echo "</div>";
        }
        ?>
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
<?php
endif;
?>