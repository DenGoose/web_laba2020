<?php
    $email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['psw']),FILTER_SANITIZE_STRING);

    $password = md5($password."fdkgjnfsdgdlmfg43r2t3r");

    $mysql = new mysqli('localhost','root','','filmoteka');

    $result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
    $user = $result->fetch_assoc();
    if(!count($user)){
        echo "Пользователь не найден";
        exit();
    }

    setcookie('user',$user['login'],time()+3600,"/");

    $mysql->close();

    header('Location: /');
