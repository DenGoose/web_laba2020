<?php
/**
 * @param $rate - рейтинг пользователя
 * @param $user - Логин пользователя
 * @param $film_id - номер фильма
 */
function add_rating($rate, $user, $film_id)
{
    $mysql = new mysqli('localhost', 'root', '', 'filmoteka');
    $result = $mysql->query("SELECT id FROM users WHERE login = '$user'");
    $result = $result->fetch_assoc();
    $id = $result['id'];
    $mysql->query("INSERT INTO hit_rating.rating (id_film, id_user, rate) VALUE ('$film_id','$id','$rate')");
    $result_f = $mysql->query("SELECT rating, rating_count FROM fimes.film WHERE id = '$film_id'");
    $result_f = $result_f->fetch_assoc();
    $rating = $result_f['rating'] + $rate;
    $count = $result_f['rating_count'] + 1;
    $mysql->query("UPDATE fimes.film SET rating = '$rating' , rating_count = '$count' where id = '$film_id'");
    $mysql->close();

}

/**
 * @param $user - логин пользователя
 * @param $film_id - id фильма
 * @return int Вывод рейтинга пользователя
 */
function check_rating($user, $film_id)
{
    $mysql = new mysqli('localhost', 'root', '', 'filmoteka');
    $result_id = $mysql->query("SELECT id FROM users WHERE login = '$user'");
    $result_id = $result_id->fetch_assoc();
    $id = $result_id['id'];
    $result = $mysql->query("SELECT rate FROM hit_rating.rating WHERE id_film = '$film_id' and id_user ='$id'");
    $result = $result->fetch_assoc();
    $rating = $result['rate'];
    $mysql->close();
    return $rating;
}

/**
 * @param $film_id - id фильма
 * @return float|int Общий рейтинг фильма всех польователей
 */
function rating($film_id)
{
    $mysql = new mysqli('localhost', 'root', '', 'filmoteka');
    $result = $mysql->query("SELECT rating,rating_count FROM fimes.film WHERE id='$film_id'");
    $result = $result->fetch_assoc();
    if ($result['rating_count'] == 0) {
        return 0;
    }
    return $result['rating'] / $result['rating_count'];
}