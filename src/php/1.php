<?php
$email = "vadim@vadim";
$psw = "123";

$mysql = new mysqli('localhost', 'root', '', 'filmoteka');
$mysql->query("UPDATE `users` SET `password` = '$psw' WHERE `email` = '$email'");

$mysql->close();