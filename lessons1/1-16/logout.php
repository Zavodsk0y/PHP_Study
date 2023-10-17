<?php
// Создайте страницу для разлогинивания - logout.php. При переходе на неё должны удаляться cookie с ключами login
// и password и выполняться редирект на главную страницу. В качестве ответа предоставьте полный код файла logout.php.

if(!empty($_COOKIE)) {
    $login = $_COOKIE['login'];
    $password = $_COOKIE['password'];
    setcookie('login', $login, time() - 10, '/');
    setcookie('password', $password, time() - 10, '/');
    header('Location: /index.php');
}