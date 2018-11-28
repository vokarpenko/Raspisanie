<?php defined('INDEX') OR die('Прямой доступ к странице запрещён!');
	/* КОМПОНЕНТ СТРАНИЦЫ */
	$lastname = $db->decode($_GET['lastname']);
	$firstname = $db->decode($_GET['firstname']);
	$fathername = $db->decode($_GET['fathername']);
	$phonenumber = $db->decode($_GET['phonenumber']);
	$wish = $db->decode($_GET['wish']);
	$query = "INSERT INTO `prepod` (`ID`, `nam_prepod`, `phonenumber`) VALUES (NULL, '".$lastname." ".$firstname." ".$fathername."', '".$phonenumber."')";
	$db->run($query);
	$query = "SELECT * FROM `prepod` WHERE `nam_prepod`='".$lastname." ".$firstname." ".$fathername."'";
	$db->run($query);
	$db->row();
	$prepod_id = $db->data['ID'];
	$query2 = "INSERT INTO wishes (`ID`, `wish_text`, `prepod_id`) VALUES (NULL, '".$wish."', '".$prepod_id."')"  ;
	$db->run($query2);

	// ПЕРЕМЕННЫЕ КОМПОНЕНТА


	$db->stop();
?>