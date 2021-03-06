<?php
session_start();
if (isset($_SESSION['token'])) {
    unset($_SESSION['token']);
    setcookie('token', '', time() - 3600, "/");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <title>Фильмотека</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="/assets/images/icon.ico" type="image/ico">
    <link href="/assets/css/style.css" rel="stylesheet"/>
</head>

<body class="text-center vigneette">
<div class="cover-container d-inline-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand"><a href="/index.php"> Фильмотека </a></h3>
            <nav class="nav_nav">
                <div class="nav nav-masthead_f">
                    <a class="nav-link " href="/pages/filmes.php">Фильмы и сериалы</a>
                    <!-- <a class="nav-link" href="/pages/clients.html">Клиенты</a> -->
                </div>
                <div class="nav nav-masthead">
                    <a class="btn btn-secondary" href="/pages/auth.php">Войти</a>
                    <a href="register.php" class="nav-link register">Регистрация</a>
                </div>
            </nav>
        </div>
    </header>

    <main role="main" class="inner cover">
        <form action="../src/php/sign_in.php" method="post" class="form-signin back_bl">
            <h1 class="h3 mb-3 font-weight-normal">Личный кабинет</h1>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email адрес" name="email" required
                   autofocus>
            <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" name="psw" required>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="1" name="check"> Не выходить
                </label>
            </div>
            <button class="registerbtn" type="submit">Войти</button>
            <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
            ?>
        </form>

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