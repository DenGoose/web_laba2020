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
    + **Внешний регистрации**</br>
        ![reg](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/2/reg.png)
    + **Ошибка использования существующих логинов и паролей**</br>
        ![error_email](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/2/error_email.png)
    + **Успешная регистрация**</br>
        ![sucsess](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/2/sucsess.png)
    + **Страница авторизированного пользователя**</br>
        ![signin](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/2/signin.png)
    + **Страница НЕ авторизированного пользователя**</br>
        ![un_signin](https://github.com/DenGoose/web_laba2020/blob/master/assets/images/github/2/un_signin.png)

2) **Дамб Базы данный (MySQL)**

~~~sql
--  filmoteka это название БД
--  users это название таблицы

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned auto_increment,
  `email` varchar(50),
  `password` varchar(32),
  `login` varchar(50),
  UNIQUE `id` (`id`),
  UNIQUE `login` (`login`),
  UNIQUE `email` (`email`)
)/*! engine=MyISAM */;

-- Полный код можно посмотреть в /sql/filmoteka.sql

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

//  Более подробный код вы можете посмотреть в /src/php/sign_up.php
//  Это краткая версия кода  

    $email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['psw']),FILTER_SANITIZE_STRING);
    $password_r = filter_var(trim($_POST['psw-repeat']),FILTER_SANITIZE_STRING);
    $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);

    $password = md5($password."fdkgjnfsdgdlmfg43r2t3r");

    $mysql = new mysqli('localhost','root','','filmoteka');
    $mysql->query("INSERT INTO `users` (`email`,`password`,`login`) VALUES('$email','$password','$login')");

?>
~~~~

5) **Авторизация**

~~~php
<?php

//  Более подробный код вы можете посмотреть в /src/php/sign_in.php
//  Это краткая версия кода  

    $email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['psw']),FILTER_SANITIZE_STRING);

    $password = md5($password."fdkgjnfsdgdlmfg43r2t3r");

    $mysql = new mysqli('localhost','root','','filmoteka');

    $result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
    $check_if = mysqli_num_rows($result);
    $user = $result->fetch_assoc();
    if(!$check_if){
        $_SESSION['message']= "Неверный логин или пароль";
        header('Location: /pages/auth.php');
        exit();
    }

    if(isset($_POST['check']) && $_POST['check'] == '1') {
        setcookie('user', $user['login'], time() + 3600*24*7, "/");
    }else{
        echo '0';
        setcookie('user', $user['login'], 0 ,"/");
    }

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

## <a name="Third">Лабораторная работа 3 "Решение прикладных задач на PHP"</a>

## <a name="Fourth">Лабораторная работа 4 "Реализуем интерфейс управления данными. CR (без UD) на одной таблице"</a>

## <a name="Fifth">Лабораторная работа 5 "Реализуем интерфейс управления данными. CRUD 2 связанных таблиц полностью"</a>

## <a name="Sixth">Лабораторная работа 6 "Собственная регистрация, поиск, авторизация через таблицу users, внешняя авторизация"</a>

## <a name="Seventh">Лабораторная работа 7 "Углубленная работа с данными"</a>

## <a name="Eighth">Лабораторная работа 8 "Переделываем результат 5 ЛР (CRUD 2 таблиц) на ajax и работу в режиме single page application"</a>