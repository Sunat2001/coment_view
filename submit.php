<?php

// Сообщение об ошибке:
error_reporting(E_ALL^E_NOTICE);

include "connect.php";
include "comment.class.php";

/*
/	Данный массив будет наполняться либо данными,
/	которые передаются в скрипт,
/	либо сообщениями об ошибке.
/*/

$arr = array();
$validates = Comment::validate($arr);

if($validates)
{
	/* Все в порядке, вставляем данные в базу: */
	
	mysqli_query($link,"	INSERT INTO comments(name,url,email,body)
					VALUES (
						'".fix_string($arr['name'])."',
						'".fix_string($arr['url'])."',
						'".fix_string($arr['email'])."',
						'".fix_string($arr['body'])."'
					)");
	
	$arr['dt'] = date('r',time());
	$arr['id'] = mysqli_insert_id();
	
	/*
	/	Данные в $arr подготовлены для запроса mysql,
	/	но нам нужно делать вывод на экран, поэтому 
	/	готовим все элементы в массиве:
	/*/
	
	$arr = array_map('stripslashes',$arr);
	
	$insertedComment = new Comment($arr);

	/* Вывод разметки только-что вставленного комментария: */

	echo json_encode(array('status'=>1,'html'=>$insertedComment->markup()));

}
else
{
	/* Вывод сообщений об ошибке */
	echo '{"status":0,"errors":'.json_encode($arr).'}';
}
function fix_string($string)
{
if (get_magic_quotes_gpc()) $string = stripslashes($string);
return htmlentities ($string);
}

?>