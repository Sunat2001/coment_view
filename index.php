<?php

// Сообщение об ошибке:
error_reporting(E_ALL^E_NOTICE);

include "connect.php";
include "comment.class.php";


/*
/	Выбираем все комментарии и наполняем массив $comments объектами
*/

$comments = array();
$result = mysqli_query($link,"SELECT * FROM comments ORDER BY id ASC");

while($row = mysqli_fetch_assoc($result))
{
	$comments[] = new Comment($row);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Система комментариев для сайта на PHP | Демонстрация для сайта RUDEBOX</title>

<link rel="stylesheet" type="text/css" href="styles.css" />

</head>

<body>

<br><br><br><br><br><br><br><br><br><br><br>
<div id="main">

<?php

/*
/	Вывод комментариев один за другим:
*/

foreach($comments as $c){
	echo $c->markup();
}

?>

<div id="addCommentContainer">
	<p>Добавить комментарий</p>
	<form id="addCommentForm" method="post" action="">
    	<div>
        	<label for="name">Имя</label>
        	<input type="text" name="name" id="name" />
            
            <label for="email">Email</label>
            <input type="text" name="email" id="email" />
            
            <label for="url">Вебсайт (не обязательно)</label>
            <input type="text" name="url" id="url" />
            
            <label for="body">Содержание комментария</label>
            <textarea name="body" id="body" cols="20" rows="5"></textarea>
            
            <input type="submit" id="submit" value="Отправить" />
        </div>
    </form>
</div>

</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>

</body>
</html>
