<?php
/**
 * Created by PhpStorm.
 * User: vadimyushchenko
 * Date: 4/6/14
 * Time: 2:51 PM
 */

$sites = array(
    "en" => "http://vmy.com/en/",
    "ru" => "http://vmy.com/ru/",
    "fr" => "http://vmy.com/fr/",
    "de" => "http://vmy.com/de/",
);

// Get 2 char lang code
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
// Установка языка по умолчанию если переменная $lang не соответствуют не одному значению из массива $site
if (!isset($sites[$lang])) {
    $lang = 'en';
    }
// Редирект пользователя на нужный домен
header('Location: ' . $sites[$lang]);
exit;