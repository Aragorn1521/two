<?php
//
//// Регулярные выражения
//$string = 'Он закончил школу в 2000 году. Стал студентом в 2002 году';
//$pattern = '/[0-9]{4}/'; //{4} - В данном случае это квантификатор - ищем 4 символа
////{3,5}- от 3 до 5 символов {1,} - 1 и более - альтернативная форма записи +
//$result = preg_match($pattern, $string);
//var_dump($result);
//echo $string;

//FRONT CONTROLLER
//1.Общие настройки

//Вывод ошибок
ini_set('display_errors',1);
error_reporting(E_ALL);

//2.Подключение файловой системы
define('ROOT', dirname(__FILE__));
require_once (ROOT.'/components/Router.php');
require_once(ROOT.'/components/Db.php');


//3.Установка соединения с БД



//4.Вызов Router
$router = new Rouret();
$router->run();