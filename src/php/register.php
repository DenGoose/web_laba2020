<?php
    $email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['psw']),FILTER_SANITIZE_STRING);
    $password_r = filter_var(trim($_POST['psw-repeat']),FILTER_SANITIZE_STRING);
    $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);

    if ($password!=$password_r){
       echo "Пороли не совпадают";
       exit();
    }

    $password = md5($password."fdkgjnfsdgdlmfg43r2t3r");

    $mysql = new mysqli('localhost','root','','filmoteka');

    $result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' OR `login` = '$login'");
    $user = $result->fetch_assoc();
    if(count($user)){
        ?>
        <html>
        <body>
            <h3>Вы ввели существующий email или логин</h3>
            <p><a href="../../pages/register.html">Вернуться назад</a> </p>
        </body>
        </html>
        <?php
    exit();
    }

    $mysql->query("INSERT INTO `users` (`email`,`password`,`login`) VALUES('$email','$password','$login')");

    $mysql->close();

    header('Location: /pages/auth.html');
