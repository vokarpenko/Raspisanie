<?php session_start();
	define("INDEX", ""); // УСТАНОВКА КОНСТАНТЫ ГЛАВНОГО КОНТРОЛЛЕРА

	require_once($_SERVER['DOCUMENT_ROOT']."RaspisanieServer/cfg/core.php"); // ПОДКЛЮЧЕНИЕ ЯДРА

	// ПОДКЛЮЧЕНИЕ К БД
	$db = new MyDB();
	$db->connect();

	// ГЛАВНЫЙ КОНТРОЛЛЕР
	
	switch ($_GET['option']) {
	case "page":
		include($_SERVER['DOCUMENT_ROOT']."RaspisanieServer/com/page.php");
		include ($_SERVER['DOCUMENT_ROOT']."RaspisanieServer/template.php");
		break;
	case "mInfo":
		include($_SERVER['DOCUMENT_ROOT']."RaspisanieServer/com/page1.php");
		echo "<pre>".json_encode($table,JSON_UNESCAPED_UNICODE)."</pre>";
		break;
	default:
		include($_SERVER['DOCUMENT_ROOT']."RaspisanieServer/com/home.php");
		include ($_SERVER['DOCUMENT_ROOT']."RaspisanieServer/template.php");
		break;
	}
	
	$db->close();
?>