<?php
session_start();

$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['psw']), FILTER_SANITIZE_STRING);

$password = md5($password . "fdkgjnfsdgdlmfg43r2t3r");

$mysql = new mysqli('localhost', 'root', '', 'filmoteka');

$result = $mysql->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
$check_if = mysqli_num_rows($result);
$user = $result->fetch_assoc();
if (!$check_if) {
    $_SESSION['message'] = "Неверный логин или пароль";
    header('Location: /pages/auth.php');
    exit();
}

if (isset($_POST['check']) && $_POST['check'] == '1') {
    $token = md5(uniqid(rand(), true));
    $_SESSION['token'] = $token;

    setcookie('user', $user['login'], time() + 3600 * 24 * 7, "/");
    setcookie('token', $token, time() + 3600 * 24 * 7, "/");
} else {
    $token = md5(uniqid(rand(), true));
    $_SESSION['token'] = $token;

    setcookie('user', $user['login'], 0, "/");
    setcookie('token', $token, 0, "/");
}

$mysql->close();
header('Location: /');