<?php
    $email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['psw']),FILTER_SANITIZE_STRING);
    $password_r = filter_var(trim($_POST['psw-repeat']),FILTER_SANITIZE_STRING);

    if ($password!=$password_r){
       echo "Пороли не совпадают";
       exit();
    }

    $password = md5($password."fdkgjnfsdgdlmfg43r2t3r");

    $mysql = new mysqli('localhost','root','','filmoteka');
    $mysql->query("INSERT INTO `users` (`email`,`password`) VALUES('$email','$password')");

    $mysql->close();

    header('Location: /');
