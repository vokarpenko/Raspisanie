<?php 

define("INDEX", "");
require_once($_SERVER['DOCUMENT_ROOT']."/cfg/core.php"); 
require_once($_SERVER['DOCUMENT_ROOT']."/com/library.php");
$db = new MyDB();
$db->connect();
session_start();
	//$_SESSION['db']=$db;
$is_mobile_device = check_mobile_device();
if($_SERVER['HTTP_HOST'][0]=='m'){
	include($_SERVER['DOCUMENT_ROOT']."/m/index.php");
}
else{
	if($is_mobile_device){
		header('Location: http://m.timetable-fktpm.ru');

	// echo "Вы зашли с мобильного устройства";
	}
	else{
		include($_SERVER['DOCUMENT_ROOT']."/com/head.php");
	// ГЛАВНЫЙ КОНТРОЛЛЕР
		if(!empty($_GET['option'])){
			switch ($_GET['option']) {
				case "add":
					if((!empty($_SESSION['login']))&&($_SESSION['login'] == 'admin')){
						include($_SERVER['DOCUMENT_ROOT']."/com/addPar.php");
					}
					else{
						echo "нет прямого доступа!";
					}
				break;

				case "createRaspisanie":
					if((!empty($_SESSION['login']))&&($_SESSION['login'] == 'admin')){
						include($_SERVER['DOCUMENT_ROOT']."/com/home.php");
					}
					else{
						echo "нет прямого доступа!";
					}
				break;

				case "android":
					if((!empty($_SESSION['login']))&&($_SESSION['login'] == 'admin')){
						include($_SERVER['DOCUMENT_ROOT']."/com/androidProverka.php");
					}
					else{
						echo "нет прямого доступа!";
					}
				break;

				case "Wishes":
					if((!empty($_SESSION['login']))&&($_SESSION['login'] == 'admin')){
						include($_SERVER['DOCUMENT_ROOT']."/com/wishes.php");
					}
					else{
						echo "нет прямого доступа!";
					}
				break;

				case "mInfo":
				include($_SERVER['DOCUMENT_ROOT']."/com/infoTimeTable.php");
				echo "<timetable>".json_encode($table,JSON_UNESCAPED_UNICODE)."</timetable>";
				break;

				case "mDepartment":
				include($_SERVER['DOCUMENT_ROOT']."/com/departmentInfo.php");
				echo "<timetable>".json_encode($table,JSON_UNESCAPED_UNICODE)."</timetable>";
				break;

				case "mWish":
				include($_SERVER['DOCUMENT_ROOT']."/com/putInfo.php");
				break;

				case "dictionary":
				include($_SERVER['DOCUMENT_ROOT']."/com/dictionary.php");
				break;

				default:
				include($_SERVER['DOCUMENT_ROOT']."/com/wishesCheck.php");
				break;
			}
		}
		else{

			include($_SERVER['DOCUMENT_ROOT']."/com/wishesCheck.php");
		}
	}}
	// ПОДКЛЮЧЕНИЕ ЯДРА

	//$db->close();
	   /*$_SESSION = array();
	   if (isset($_COOKIE[session_name()])) {  // session_name() - получаем название текущей сессии
    		setcookie(session_name(), '', time()-86400, '/');
     		session_destroy();  
  		}*/ // закрытие сессии
  		?>