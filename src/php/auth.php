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

    if(isset($_POST['check']) && $_POST['check'] == '1') {
        setcookie('user', $user['login'], time() + 3600*24*7, "/");
    }else{
        echo '0';
        setcookie('user', $user['login'],0,"/");
    }

    $mysql->close();
    header('Location: /');
