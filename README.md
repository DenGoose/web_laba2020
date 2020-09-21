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
Познакомиться с основными понятиями веб-интерфейсов, языком HTML и протоколом HTTP.

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

1) Сценарии использования сайта:
    + Гость может зайти на сайт и попадёт на **главную**
    + Гость может может посмотреть **список доступных фильмов**, перейдя в каталог Фильмы
    + Гость может посмотреть **историю просмотров фильмов**, перейдя во вкладку История
    + Гость может **зарегестрироваться** на сайте
    + Гость может **войти на сайт**, под своим аккаунтом

2) Сетка сайта:
    + **Главная** </br>
        ![main](https://github.com/DenGoose/web_laba2020/blob/dev/assets/images/github/main.jpg)
    + **Фильмы** </br>
        ![filmes](https://github.com/DenGoose/web_laba2020/blob/dev/assets/images/github/filmes.jpg)
    + **Вход** </br>
        ![login](https://github.com/DenGoose/web_laba2020/blob/dev/assets/images/github/login.jpg)
    + **Регистрация** </br>
        ![reg](https://github.com/DenGoose/web_laba2020/blob/dev/assets/images/github/reg.jpg)

3) Структура сайта:
    + **index.html**
    + **/pages/filmes.html**
    + **/pages/history.html**
    + **/pages/auth.html**
    + **/pages/register.html**
    + **/assets/css/style.css**

4) Тест серверных запросов через **telnet**.
    + **HEAD** </br>
        ![HEAD](https://github.com/DenGoose/web_laba2020/blob/dev/assets/images/github/head.png)
    + **GET** </br>
        ![GET](https://github.com/DenGoose/web_laba2020/blob/dev/assets/images/github/get.png)
    + **404** </br>
        ![error404](https://github.com/DenGoose/web_laba2020/blob/dev/assets/images/github/error404.png)
    + **POST** </br>
        ![POST](https://github.com/DenGoose/web_laba2020/blob/dev/assets/images/github/post.png)

## <a name="Second">Лабораторная работа 2 "Stateless HTTP-протокол и его реальное применение."</a>

## <a name="Third">Лабораторная работа 3 "Решение прикладных задач на PHP"</a>

## <a name="Fourth">Лабораторная работа 4 "Реализуем интерфейс управления данными. CR (без UD) на одной таблице"</a>

## <a name="Fifth">Лабораторная работа 5 "Реализуем интерфейс управления данными. CRUD 2 связанных таблиц полностью"</a>

## <a name="Sixth">Лабораторная работа 6 "Собственная регистрация, поиск, авторизация через таблицу users, внешняя авторизация"</a>

## <a name="Seventh">Лабораторная работа 7 "Углубленная работа с данными"</a>

## <a name="Eighth">Лабораторная работа 8 "Переделываем результат 5 ЛР (CRUD 2 таблиц) на ajax и работу в режиме single page application"</a>