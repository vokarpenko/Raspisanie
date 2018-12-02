<?php 

if(!isset($_SESSION)){ 
	session_start();
}
define("INDEX", "");
require_once($_SERVER['DOCUMENT_ROOT']."/cfg/core.php"); 
require_once($_SERVER['DOCUMENT_ROOT']."/com/library.php");
$db = new MyDB();
$db->connect();
echo ;
	//$_SESSION['db']=$db;
$is_mobile_device = check_mobile_device();
if($is_mobile_device){
	if($_SERVER['HTTP_HOST'][0]!=m){
		header('Location: http://m.timetable-fktpm.ru/');
	}
	// echo "Вы зашли с мобильного устройства";
}else{
	include($_SERVER['DOCUMENT_ROOT']."/com/head.php");
	// ГЛАВНЫЙ КОНТРОЛЛЕР
	if(!empty($_GET['option'])){
		switch ($_GET['option']) {
			case "add":
			include($_SERVER['DOCUMENT_ROOT']."/com/addPar.php");
			break;
			case "createRaspisanie":
			include($_SERVER['DOCUMENT_ROOT']."/com/home.php");
			break;
			case "mInfo":
			include($_SERVER['DOCUMENT_ROOT']."/com/infoTimeTable.php");
			echo "<timetable>".json_encode($table,JSON_UNESCAPED_UNICODE)."</timetable>";
			break;
			case "mWish":
			include($_SERVER['DOCUMENT_ROOT']."/com/putInfo.php");
			break;
			default:
			include($_SERVER['DOCUMENT_ROOT']."/com/wishes.php");
			break;
		}
	}
	else{
		
		include($_SERVER['DOCUMENT_ROOT']."/com/wishes.php");
	}
}
	// ПОДКЛЮЧЕНИЕ ЯДРА

	//$db->close();
	   /*$_SESSION = array();
	   if (isset($_COOKIE[session_name()])) {  // session_name() - получаем название текущей сессии
    		setcookie(session_name(), '', time()-86400, '/');
     		session_destroy();  
  		}*/ // закрытие сессии
?>