<?php

/* Конфигурация базы данных */

$db_host		= 'localhost';
$db_user		= 'ca68017_coments';
$db_pass		= 'ff6c808a';
$db_database		= 'ca68017_coments'; 

/* Конец секции */


$link = @mysqli_connect($db_host,$db_user,$db_pass,$db_database) or die('Не могу установить соединение с базой данных');

mysqli_query($link,"SET NAMES 'utf8'");


?>
