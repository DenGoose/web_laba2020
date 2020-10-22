# Технологии разработки Веб-сервисов"

## **Гусельников Денис и Громко Дарья ПМИБ-191**

Содержание:

1) [Основы веб-разработки HTML и HTTP](#First)
2) [Stateless HTTP-протокол и его реальное применение.](#Second)
3) [Решение прикладных задач на PHP.](#Third)
4) [Реализуем интерфейс управления данными. CR (без UD) на одной таблице.](#Fourth)
5) [Реализуем интерфейс управления данными. CRUD 2 связанных таблиц полностью.](#Fifth)
6) [Собственная регистрация, поиск, авторизация через таблицу users, внешняя авторизация.](#Sixth)
7) [Углубленная работа с данными.](#Seventh)
8) [Переделываем результат 5 ЛР на ajax и работу в режиме single page application.](#Eighth)

[*Ссылка на документ ЛБ Google Диск*](https://docs.google.com/document/d/1JPA36Lfz-_EIdT6pyAc8ubkYHBWxPVtj5VMs4Py-nn8/edit#heading=h.r47yxwn74jhb)

## <a name="First">Лабораторная работа 1 "Основы веб-разработки HTML и HTTP"</a>

***Цель работы:***
Познакомиться с **основными понятиями веб-интерфейсов**, языком HTML и протоколом HTTP.

***Тема проекта:*** Фильмотека: список фильмов, список клиентов, список библиотекарей, журнал выдачи фильмов.

***Нужно провести следующую работу :***

1) Описать текстом минимум **3 use case** (сценария использования) сайта.
2) Нарисовать“сетки дизайна” для минимум **3-х страниц** будущего сайта.
3) Собрать эти 3 страницы на **bootstrap**.
4) Установить и запустить в **XAMPP** (В нашем случае плагин для **VSCode Live Server**, это тоже сервер).
5) С помощью **telnet** открыть свой свежесделанный сайт из трех страниц с использованием протокола **http**.
6) С помощью ручного ввода команд получить
    + Заголовки каждой страницы через **HEAD**, проверить статус ответа
    + Содержимое каждой страницы через **GET**, проверить статус ответа
    + Заголовок и содержимое несуществующей страницы, например **any_page.html**
    + Попробовать отправить **POST-запрос** на главную страницу

### ***Ход работы:***

1) Тема проекта: **"Фильмотека: список фильмов, список клиентов, список библиотекарей, журнал выдачи фильмов"**

2) Сценарии использования сайта:
    + Гость может зайти на сайт и попадёт на **главную**
    + Гость может может посмотреть **список доступных фильмов**, перейдя в каталог Фильмы
    + Гость может посмотреть **историю просмотров фильмов**, перейдя во вкладку История
    + Гость может **зарегестрироваться** на сайте
    + Гость может **войти на сайт**, под своим аккаунтом

3) Сетка сайта:
    + **Главная** </br>
        ![main](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/main.jpg)
    + **Фильмы** </br>
        ![filmes](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/filmes.jpg)
    + **Вход** </br>
        ![login](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/login.jpg)
    + **Регистрация** </br>
        ![reg](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/reg.jpg)

4) Структура сайта:
    + **index.html**
    + **/pages/filmes.html**
    + **/pages/history.html**
    + **/pages/auth.html**
    + **/pages/register.html**
    + **/assets/css/style.css**

5) Скриншот сайта</br>
![index](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/index.png)

6) Тест серверных запросов через **telnet**.
    + **HEAD** </br>
        ![HEAD](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/head.png)
    + **GET** </br>
        ![GET](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/get.png)
    + **404** </br>
        ![error404](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/error404.png)
    + **POST** </br>
        ![POST](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/post.png)

## <a name="Second">Лабораторная работа 2 "Stateless HTTP-протокол и его реальное применение."</a>

***Цель работы:*** Механизм авторизации: **сессии, куки, предоставление доступа, переадресация, простейший запрос к БД.**

***Нужно провести следующую работу:***

1) Опираясь на тему и use case первой лабораторной работы, подробно **описать use case авторизации**
    + **Внешний вид** формы логина
    + Поля **формы логина**
    + **Внешний вид** страницы ошибки
    + **Внешний вид** страницы после авторизации
    + Какие данные сайт показывает **после авторизации**
    + Как выглядит и как работает кнопка **“выход”**
2) **Собрать** в стиле 1 ЛР страницы
    + Неавторизованного пользователя
    + **Формы** авторизации
    + **Ошибки** авторизации
    + После авторизации - страница (можно 2-3) **личного кабинета**
    + После выхода
3) **Создать таблицу** (*можно 2-3) базы данных для показа **“секретных данных”** через **phpmyadmin**. Опирайтесь на требования из темы.
4) Создать **ассоциативный массив логинов-паролей** в PHP через текстовый редактор.
5) Написать на PHP **программный код** для решения задач
    + Обработки кнопки **“вход”**
    + Показа данных в **личном кабинете**. Данные пусть соответствуют теме
    + Обработки кнопки **“выход”**
6) **Собрать проект** в готовое решение.

***Ход работы:***

1) **Use case авторизации**
    + **Внешний вид регистрации**</br>
        ![reg](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/2/reg.png)
    + **Несовпадение паролей**</br>
        ![error_psw](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/2/error_psw.png)
    + **Ошибка использования существующих логинов и паролей**</br>
        ![error_email](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/2/error_email.png)
    + **Успешная регистрация**</br>
        ![sucsess](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/2/sucsess.png)
    + **Внешний вид авторизации**</br>
        ![login](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/2/login.png)
    + **Ошибка почты или пароля**</br>
        ![error_login](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/2/error_login.png)
    + **Страница авторизированного пользователя**</br>
        ![signin](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/2/signin.png)
    + **Страница НЕ авторизированного пользователя**</br>
        ![un_signin](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/2/un_signin.png)

2) **Дамб Базы данный (MySQL)**

~~~sql
--  filmoteka это название БД
--  users это название таблицы

-- MySQL dump 10.10
--
-- Host: 127.0.0.1    Database: filmoteka
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.14-MariaDB

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned auto_increment,
  `email` varchar(50),
  `password` varchar(32),
  `login` varchar(50),
  UNIQUE `id` (`id`),
  UNIQUE `login` (`login`),
  UNIQUE `email` (`email`)
) engine=MyISAM ;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
INSERT INTO `users` VALUES (1,'qwe@qwe.com','7eefcd70400c2ab9d4fb75ac312354ee','qwe'),(2,'asd@asd.com','a97c06483dc14e2728ce808f03f1ae92','asd'),(3,'zxc@zxc.com','8c25f101a99fc35d0a07ca12edf1392e','zxc');
UNLOCK TABLES;


-- Полный путь файла /sql/filmoteka.sql

~~~

3) **Ассоциотивый массив**</br>
    Ассоциотивный массв можно увидеть на примере метода **fetch_assoc();** класса **mysqli_result**</br>

~~~php
<?php
    ...

    $result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
    $user = $result->fetch_assoc();

    print_r($user);
    // Результат функции:
    // Array ( [id] => 1 [email] => qwe@qwe.com [password] => 7eefcd70400c2ab9d4fb75ac312354ee [login] => qwe)

?>
~~~


4) **Регистрация**

~~~~php
<?php

    session_start();

    $email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['psw']),FILTER_SANITIZE_STRING);
    $password_r = filter_var(trim($_POST['psw-repeat']),FILTER_SANITIZE_STRING);
    $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);

    if ($password!=$password_r){
        $_SESSION['message']= "Пароли не совпадают";
        header('Location: /pages/register.php');
        exit();
    }

    $password = md5($password."fdkgjnfsdgdlmfg43r2t3r");

    $mysql = new mysqli('localhost','root','','filmoteka');

    $result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' OR `login` = '$login'");
    $check_if = mysqli_num_rows($result);
    if($check_if){
        $_SESSION['message']= "Данный email или логин уже существуют";
        header('Location: /pages/register.php');
    exit();
    }

    $mysql->query("INSERT INTO `users` (`email`,`password`,`login`) VALUES('$email','$password','$login')");
    $_SESSION['message'] = 'Регистрация прошла успешно!';
    header('Location: ../index.php');

    $mysql->close();

    header('Location: /pages/auth.php');

?>
~~~~

5) **Авторизация**

~~~php
<?php

    session_start();

    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['psw']), FILTER_SANITIZE_STRING);

    $password = md5($password . "fdkgjnfsdgdlmfg43r2t3r");

    $mysql = new mysqli('localhost', 'root', '', 'filmoteka');

    $result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' AND     `password` = '$password'");
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

?>
~~~

***Контрольные вопросы:***

1) Какой тип запроса к веб-серверу следует использовать **для отправки данных авторизации**?
    + Опишите почему **нельзя использовать другие**?
    + Покажите скриншотом или конкретным кодом в вашем проекте что будет если использовать **неправильный метод**.
2) Что такое **хэш-функция**? Для чего она нужна в механизме авторизации.
    + Приведите место в код вашего проекта **где уместно использование хеш-функции**.
3) Какие **“уязвимости”** в созданном механизме авторизации вы видите? Покажите скриншот, показывающий найденную **уязвимость** и код, которым вы его закрыли. Подсказки:
    + **Прямая ссылка**
    + **“Мусорные данные в авторизации”**
    + **Хранение недопустимых данных в cookie**
4) Как сделать чтобы после авторизации обновление страницы **не вызывало запрос** браузера вида **“требуется повторная отправка формы”**?
    + Покажите кусок кода, которым вы **убрали это сообщени**е.
5) Чем отличается авторизация на **профессионально сделанном сайте** от того, что сделали вы?
    + Выберите проект по той же теме, по которой у вас лабораторная.

***Отвыты на КР:***

1) **Методы отправки запроса.** Разницы между ними никакой. Разница только в идеи методов. **GET** запрос используется чтобы получить данные, а **POST** чтобы отправить. Лучше всего использовать **POST**, т. к. он не имеет ограничене по длине запроса, может отправлять файлы и он немного (самую малость) безопаснее.</br>
    По сути, можно использовать **GET**, вопрос в том, есть ли в этом смыл?</br>
    Неправильных методов нет. Если вы хотите использовать **GET** это ваше право. Но оно будет работать.</br>
    **GET** используют для страницы поиска, или других вещей, что не нужно изменять.

2) **Хэш функчия это криптографически-сжимающая функция** предназначенная для преобразования входного массива данных произвольной длины в выходную строку фиксированной длины (32 символа).</br>
    Она нужна **для записи пароля в БД в шифрованном виде**. Но почему именно так? А всё потому что, если вашу БД взломают, злоумышленники **не смогли найти пользоваться вашим паролем** (при желании они смогут это сделать, но не суть). Добовлят малую, но всё же защиту.</br>

~~~php
<?php

...

$password = filter_var(trim($_POST['psw']), FILTER_SANITIZE_STRING);

$password = md5($password . "fdkgjnfsdgdlmfg43r2t3r");

...

?>
~~~

3) **Уязвивости**
<Ul>
<li><strong>Прямая ссылка.</strong> Пользователь может напрямую перейти на страницу с личным кабинетом или на страницу, не предназначенную обыным пользователям. На моём сайте <strong>проверяется разегестрирован пользователь или нет</strong>. Если пользовательзователь зарегестрирован, то <strong>он может напрямую попать в личный кабинет</strong>, если нет, то попадает на страницу авторизации. Код проверки:</br>

~~~php
<?php
session_start();
if (!isset($_SESSION['token'])) {
    setcookie('user', '', time() - 3600, "/");
    header('Location: /pages/auth.php');
    exit();
}
if ($_SESSION['token'] != $_COOKIE['token']) :
    setcookie('user', '', time() - 3600, "/");
    header('Location: /pages/auth.php');
    exit();

?>
~~~
</li>
<li>
    <strong>Мусорные данные в авторизации.</strong> Рассмотрим на примере email. Допустим пользователь решил ввести не почту, а набор букв, т. е. <strong>не соответсвует правилу написания email'а</strong>. Тогда в форме, где проиводится ввод <strong>email'а</strong> нужно прописать <strong>type="email"</strong>.
</li>
<li>
    <strong>Хранение недопустимых данных в cookie.</strong> Нелья в куки хранить <strong>секретные данные пользователя</strong>. Можно хранить логин или хеш-ключ(токен) пользователя, т.к. он равен хэш-ключу сервера.
</li>
</ul>

4) **Повторная отправка формы** Проблема решается очень просто. Когда вы отправили запрос о регистрации или авторизации, **вы перенаправляете пользователя на ту же страницу или на главную страницу**. В моём случае при регистрации скрип, служащий для обработки данный перенаправляет пользователя на страницу авторизации.

```php
<?php

    ...

    header('Location: /pages/auth.php');

    ...
?>
```

5) **Профессиональный сайт.** На таких сайтах лучше **проработана система защиты информации + сильная защита от взломой и кражи ключей авторизации**. Не знаю что ещё добавить, слишком мало опыта и информации, чтобы понять как именно работает тот или иной сайт.

## <a name="Third">Лабораторная работа 3 "Решение прикладных задач на PHP"</a>

***Задание:*** Запрограммировать арифметический калькулятор в виде веб-приложения. Продемонстрировать на странице сайта, сделанного  на 1-2 ЛР.

***Общие требования:***

+ Выделять функции, не писать тонну кода в поток.
+ Разделять логику и представление.
+ Не использовать php-фреймворков.

Задачи намеренно сформулированы недостаточно конкретно.
Требуется додумать задачу, сформулировать ее, реализовать и сдать.

***Нужно провести следующую работу:***

1) Детальная формулировка задачи с описанием **“как будем делать”**
2) **3 Тестовых примера** со скриншотами, макетами, описанием результатов. Верстаем, рисуем
3) **PHP-Код**, вставленный прямо в протокол
4) Работающее решение в виде папки с файлами.
5) **Скринкаст** работы вашего решения

***Ход работы:***

1) Задание не совсем понятное, но я решил сделать **систему рейтинга фильмов** на сайте. Пользователи могуг оценить фильм **по 5-ти бальной системе**. Так же отображается **общий рейтинг фильмов**, оценённый всеми пользователями на сайте. Если пользователь не авторизирован на сайте, то ему доступно только просмотр общего рейтинга сайта. План работы:
<Ul>
    <li> Создание 3-х функций для работы рейтинга

~~~php
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
?>
~~~
</li>
    <li> Интеграция php кода на страницу фильма

~~~php
<?php
                require_once "../../src/php/rating.php";
                if (!empty($_COOKIE['user'])) {
                    if (!check_rating($_COOKIE['user'], $id)) {
                        ?>
                        <form method="post" class="rating-area">
                            <input type="radio" id="star-5" name="rating" value="5">
                            <label for="star-5" title="Оценка «5»"></label>
                            <input type="radio" id="star-4" name="rating" value="4">
                            <label for="star-4" title="Оценка «4»"></label>
                            <input type="radio" id="star-3" name="rating" value="3">
                            <label for="star-3" title="Оценка «3»"></label>
                            <input type="radio" id="star-2" name="rating" value="2">
                            <label for="star-2" title="Оценка «2»"></label>
                            <input type="radio" id="star-1" name="rating" value="1">
                            <label for="star-1" title="Оценка «1»"></label>
                            <button type="submit" class="btn">Отправить</button>
                        </form>
                        <?php
                        require_once "../../src/php/rating.php";
                        if (isset($_POST['rating'])) {
                            add_rating($_POST['rating'], $_COOKIE['user'], $id);
                            header("Refresh:0");
                        }
                    } else {
                        $num = check_rating($_COOKIE['user'], $id);
                        ?>
                        <h3 class="rate_text">Ваш рейтинг</h3>
                        <form method="post" class="rating-area" style="margin-bottom: 20px">
                            <input type="radio" id="star-5" name="rating"
                                   value="5" <?php if ($num == 5) echo "checked" ?>>
                            <label for="star-5" title="Оценка «5»"></label>
                            <input type="radio" id="star-4" name="rating"
                                   value="4" <?php if ($num == 4) echo "checked" ?>>
                            <label for="star-4" title="Оценка «4»"></label>
                            <input type="radio" id="star-3" name="rating"
                                   value="3" <?php if ($num == 3) echo "checked" ?>>
                            <label for="star-3" title="Оценка «3»"></label>
                            <input type="radio" id="star-2" name="rating"
                                   value="2" <?php if ($num == 2) echo "checked" ?>>
                            <label for="star-2" title="Оценка «2»"></label>
                            <input type="radio" id="star-1" name="rating"
                                   value="1" <?php if ($num == 1) echo "checked" ?>>
                            <label for="star-1" title="Оценка «1»"></label>
                        </form>
                        <?php
                    }
                }
                ?>
                <div>
                    <h6 class="rate_text" ">Средний рейтинг по сайту</h6>
                    <h4 class="rate_film"><?php if (rating($id)!=0) echo round(rating($id), 2); else echo "Пока никто не голосовал";?></h4>
                </div>
~~~

</li>
</ul>

2) Скриншоты рейтинга
    + Основной вид</br>
        ![main_film](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/3/main_film.png)
    + Не авторизован, пустое</br>
        ![not_added](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/3/not_added.png)
    + Не авторизован, не пустое</br>
        ![unsign](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/3/unsign.png)
    + Авторизован, без рейтинга и пустое</br>
        ![sign_null](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/3/sign_null.png)
    + Авторизован, без рейтинга и не пустое</br>
        ![unrated](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/3/unrated.png)
    + Авторизован, с личным рейтингом и не пустое</br>
        ![rated](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/3/rated.png)

3) Скринкаст </br>
    [![video](https://img.youtube.com/vi/hMPqa8IOmes/0.jpg)](https://youtu.be/hMPqa8IOmes)

## <a name="Fourth">Лабораторная работа 4 "Реализуем интерфейс управления данными. CR (без UD) на одной таблице"</a>

## <a name="Fifth">Лабораторная работа 5 "Реализуем интерфейс управления данными. CRUD 2 связанных таблиц полностью"</a>

## <a name="Sixth">Лабораторная работа 6 "Собственная регистрация, поиск, авторизация через таблицу users, внешняя авторизация"</a>

## <a name="Seventh">Лабораторная работа 7 "Углубленная работа с данными"</a>

## <a name="Eighth">Лабораторная работа 8 "Переделываем результат 5 ЛР (CRUD 2 таблиц) на ajax и работу в режиме single page application"</a>