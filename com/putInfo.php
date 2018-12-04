<?php defined('INDEX') OR die('Прямой доступ к странице запрещён!');
/* КОМПОНЕНТ СТРАНИЦЫ */
if ($_GET['lastname'] && !empty($_GET['lastname'])&&($_GET['firstname'])&& 
	!empty($_GET['firstname'])&&($_GET['fathername'])&& !empty($_GET['fathername'])&&
	($_GET['phonenumber'])&& !empty($_GET['phonenumber'])&&($_GET['wish'])&& !empty($_GET['wish'])&&($_GET['department'])&& !empty($_GET['department'])) 
{
	
	$lastname = $db->decode($_GET['lastname']);
	$firstname = $db->decode($_GET['firstname']);
	$fathername = $db->decode($_GET['fathername']);
	$phonenumber = $db->decode($_GET['phonenumber']);
	$department = $db->decode($_GET['department']);
	$wish = $db->decode($_GET['wish']);
	
	//неплохо было бы добавить проверку на тип данных
	$query = "SELECT * FROM `kafedra` WHERE `nam_kafedra`='".$department."'";
	$db->run($query);
	$db->row();
	$kafedra_id = $db->data['ID'];

	$query = "SELECT * FROM `prepod` WHERE `nam_prepod`='".$lastname." ".$firstname." ".$fathername."'";
	$db->run($query);
	$db->num_row();
	if($db->nrows==0){
		$query = "INSERT INTO `prepod` (`ID`, `nam_prepod`, `phonenumber`,`kafedra_id`) VALUES (NULL, '".$lastname." ".$firstname." ".$fathername."', '".$phonenumber."','".$kafedra_id."')";
		$db->run($query);
		$query = "SELECT * FROM `prepod` WHERE `nam_prepod`='".$lastname." ".$firstname." ".$fathername."'";
		$db->run($query);
		$db->row();
		$prepod_id = $db->data['ID'];

		$query = "SELECT * FROM `wishes` WHERE `wish_text`='".$wish."' AND `prepod_id` = '".$prepod_id."'";
		$db->run($query);
		$db->num_row();
		if($db->nrows==0){
			$query2 = "INSERT INTO wishes (`ID`, `wish_text`, `prepod_id`) VALUES (NULL, '".$wish."', '".$prepod_id."')"  ;
			$db->run($query2);
		}
	}
	else{
		$db->row();
		$prepod_id = $db->data['ID'];
		$new_number= $db->data['phonenumber'];
		if($new_number!=$phonenumber){
			$sql = "UPDATE `prepod` SET `phonenumber` = '".$phonenumber."' WHERE `prepod`.`ID` = ".$prepod_id;
			$db->run($sql);
		}

		$query = "SELECT * FROM `wishes` WHERE `wish_text`='".$wish."' AND `prepod_id` = '".$prepod_id."'";
		$db->run($query);
		$db->num_row();
		
		if($db->nrows==0){
			$query2 = "INSERT INTO wishes (`ID`, `wish_text`, `prepod_id`) VALUES (NULL, '".$wish."', '".$prepod_id."')"  ;
			$db->run($query2);
		}
	}
	// ПЕРЕМЕННЫЕ КОМПОНЕНТА

}

$db->stop();
?>