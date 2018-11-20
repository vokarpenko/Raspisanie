<?php 
	
	if(!isset($_SESSION)){ 
		session_start();
	}
	define("INDEX", "");
	require_once($_SERVER['DOCUMENT_ROOT']."RaspisanieServer/cfg/core.php"); 
	$db = new MyDB();
	$db->connect();

	//$_SESSION['db']=$db;

	// ПОДКЛЮЧЕНИЕ ЯДРА
    include($_SERVER['DOCUMENT_ROOT']."RaspisanieServer/com/head.php");
	// ГЛАВНЫЙ КОНТРОЛЛЕР
	if(!empty($_GET['option'])){
		switch ($_GET['option']) {
		case "page":
			include($_SERVER['DOCUMENT_ROOT']."RaspisanieServer/com/page.php");
			include ($_SERVER['DOCUMENT_ROOT']."RaspisanieServer/template.php");
			break;
		case "mInfo":
			include($_SERVER['DOCUMENT_ROOT']."RaspisanieServer/com/infoTimeTable.php");
			echo "<timetable>".json_encode($table,JSON_UNESCAPED_UNICODE)."</timetable>";
			break;
		default:
			include($_SERVER['DOCUMENT_ROOT']."RaspisanieServer/com/home.php");
			include ($_SERVER['DOCUMENT_ROOT']."RaspisanieServer/template.php");
			break;
		}
	}
	else{
		
		
		
		include($_SERVER['DOCUMENT_ROOT']."RaspisanieServer/com/home.php");
		include ($_SERVER['DOCUMENT_ROOT']."RaspisanieServer/template.php");
		

	}
	//$db->close();
	   /*$_SESSION = array();
	   if (isset($_COOKIE[session_name()])) {  // session_name() - получаем название текущей сессии
    		setcookie(session_name(), '', time()-86400, '/');
     		session_destroy();  
  		}*/ // закрытие сессии
?>