<?php
    $email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['psw']),FILTER_SANITIZE_STRING);

    $password = md5($password."fdkgjnfsdgdlmfg43r2t3r");

    $mysql = new mysqli('localhost','root','','filmoteka');

    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$email' AND `password` = '$password'");
    $user = $result->fetch_assoc();
    if(count($user)==0){
        echo "Пользователь не найден";
        exit();
    }

    setcookie('user',$user['name'],time()+3600,"/");

    $mysql->close();

    header('Location: /');
