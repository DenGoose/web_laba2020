<?php

function arr()
{
    $mysql = new mysqli('localhost', 'root', '', 'filmoteka');
    $name = $_COOKIE['user'];
    $user = $mysql->query("SELECT id FROM users WHERE login='$name'");
    $user = $user->fetch_assoc();
    $user_id = $user['id'];
    $result = $mysql->query("SELECT film_id FROM views.view WHERE user_id='$user_id' ORDER BY date DESC");
    $size = mysqli_num_rows($result);

    if ($size == 0) {
        return -1;
    }
    $history = array();
    $history_n = array();

    for ($i = 0; $i < $size; $i++) {
        $arr = $result->fetch_assoc();
        $film = $arr['film_id'];
        $history[$i]['id'] = $film;
        $result_f = $mysql->query("SELECT name FROM fimes.film WHERE id = '$film'");
        $arr_f = $result_f->fetch_assoc();
        $history[$i]['name'] = $arr_f['name'];

    }
    $history_n[0] = $history[0];
    for ($i = 1; $i < $size; $i++) {
        $k = 0;
        $col = count($history_n);
        for ($j = 0; $j < $col; $j++) {
            if ($history[$i]['id'] != $history_n[$j]['id']) {
                $k++;
            } else
                break;
        }
        if ($k == $col) {
            $history_n[$col] = $history[$i];
        }
    }
    $mysql->close();
    return $history_n;
}