<?php
	//получаем данные через $_POSTи php
define("INDEX", "");
require_once($_SERVER['DOCUMENT_ROOT']."/cfg/core.php"); 


$db = new MyDB();
$db->connect();

if (($_POST['nam_prepod']) && !empty($_POST['nam_prepod'])&&($_POST['nam_kafedra'])&& !empty($_POST['nam_kafedra'])&&($_POST['phone'])&& !empty($_POST['phone'])&&($_POST['wish'])&& !empty($_POST['wish'])) {
	    // никогда не доверяйте входящим данным! Фильтруйте всё!
	$prepod = $db->decode($_POST['nam_prepod']);
	$kafedra = $db->decode($_POST['nam_kafedra']);
	$phone = $db->decode($_POST['phone']);
	$wish = $db->decode($_POST['wish']);
	    // Строим запрос
	$sql = "SELECT * FROM `kafedra` WHERE `nam_kafedra` LIKE '" . $kafedra . "'";
	    // Получаем результаты
	$db->run($sql);
	$db->num_row();
	if($db->nrows){
		$db->row();
		$kafedra_id = $db->data['ID'];
		$query = "SELECT * FROM `prepod` WHERE `nam_prepod` ='".$prepod."'";
		$db->run($query);
		$db->num_row();
		if($db->nrows==0){
			$query = "INSERT INTO `prepod` (`ID`, `nam_prepod`, `phonenumber`,`kafedra_id`) VALUES (NULL, '".$prepod."', '".$phone."','".$kafedra_id."')";
			$db->run($query);
			$query = "SELECT * FROM `prepod` WHERE `nam_prepod`='".$prepod."'";
			$db->run($query);
			$db->row();
			$prepod_id = $db->data['ID'];

			$query = "SELECT * FROM `wishes` WHERE `wish_text` ='".$wish."' AND `prepod_id` = '".$prepod_id."'";
			$db->run($query);
			$db->num_row();
			if($db->nrows==0){
				$query2 = "INSERT INTO `wishes` (`ID`, `wish_text`, `prepod_id`) VALUES (NULL, '".$wish."', '".$prepod_id."')"  ;
				$db->run($query2);
				echo "<script>infoWindow2('Добавлен преподаватель и добавлены пожелания')</script>";
			}
		}
		else{
			$db->row();
			$prepod_id = $db->data['ID'];
			$new_number= $db->data['phonenumber'];
			$new_kafedra= $db->data['kafedra_id'];
			if(($new_number!=$phone)||($new_kafedra !=$kafedra_id)){
				$sql = "UPDATE `prepod` SET `phonenumber` = '".$phone."' , `kafedra_id` = '".$kafedra_id."' WHERE `prepod`.`ID` = '".$prepod_id."'";
				$db->run($sql);
			}

			$query = "SELECT * FROM `wishes` WHERE `wish_text`='".$wish."' AND `prepod_id` = '".$prepod_id."'";
			$db->run($query);
			$db->num_row();

			if($db->nrows==0){
				$query2 = "INSERT INTO `wishes` (`ID`, `wish_text`, `prepod_id`) VALUES (NULL, '".$wish."', '".$prepod_id."')"  ;
				$db->run($query2);
				echo "<script>infoWindow2('Обновлены данные о преподавателе и добавлены пожелания')</script>";
			}else{
				echo "<script>infoWindow2('Обновлены данные о преподавателе')</script>";
			}

		}

	}else{
		echo "<script>infoWindow1(' Необходимо ввести кафедру из выпадающего списка!!!');</script>";
	}
	
}else{
	echo " <script>infoWindow1('Введите все поля!');</script>";
}
$db->stop();
?>