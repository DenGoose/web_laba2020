<?php

function hit(string $user, int $film_id)
{
    $mysql = new mysqli('localhost', 'root', '', 'filmoteka');

    $result = $mysql->query("SELECT id FROM users WHERE login = '$user'");
    $arr = $result->fetch_assoc();
    $user_id = $arr['id'];


    $mysql->query("INSERT INTO views.view (user_id, film_id) VALUE ('$user_id','$film_id')");

    $mysql->close();
}
