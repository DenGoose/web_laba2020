<?php
$mysql = new mysqli('localhost', 'root', '', 'filmoteka');
$login = $_COOKIE['user'];
$result = $mysql->query("SELECT `email` FROM `users` WHERE `login` = '$login'");
$arr = $result->fetch_assoc();
$email = $arr['email'];
