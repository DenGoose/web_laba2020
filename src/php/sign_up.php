<?php
session_start();

$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['psw']), FILTER_SANITIZE_STRING);
$password_r = filter_var(trim($_POST['psw-repeat']), FILTER_SANITIZE_STRING);
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);

if ($password != $password_r) {
    $_SESSION['message'] = "Пароли не совпадают";
    header('Location: /pages/register.php');
    exit();
}

$password = md5($password . "fdkgjnfsdgdlmfg43r2t3r");

$mysql = new mysqli('localhost', 'root', '', 'filmoteka');

$result = $mysql->query("SELECT * FROM users WHERE email = '$email' OR login = '$login'");
$check_if = mysqli_num_rows($result);
if ($check_if) {
    $_SESSION['message'] = "Данный email или логин уже существуют";
    header('Location: /pages/register.php');
    exit();
}

$mysql->query("INSERT INTO users (email,password,login) VALUES('$email','$password','$login')");
$_SESSION['message'] = 'Регистрация прошла успешно!';

$mysql->close();

header('Location: /pages/auth.php');
