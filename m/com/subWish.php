<?php
	//получаем данные через $_POSTи php
	define("INDEX", "");
	require_once($_SERVER['DOCUMENT_ROOT']."/cfg/core.php"); 
	session_start();

	$db = new MyDB();
	$db->connect();

	if ($_POST['nam_prepod'] && !empty($_POST['nam_prepod'])&&($_POST['nam_kafedra'])&&!empty($_POST['nam_kafedra'])&&($_POST['phone'])&& !empty($_POST'phone'])&&($_POST['wish'])&& !empty($_POST['wish'])) {
	    // никогда не доверяйте входящим данным! Фильтруйте всё!
	    $prepod = $db->decode($_GET['nam_prepod']);
		$kafedra = $db->decode($_GET['nam_kafedra']);
		$phone = $db->decode($_GET['phone']);
		$wish = $db->decode($_GET['wish']);
	    // Строим запрос
		$sql = "SELECT * FROM kafedra WHERE nam_kafedra LIKE '" . $kafedra . "'";
	    // Получаем результаты
	    $db->run($sql);
	    $db->num_row();
	    if($db->nrows){
	    	$db->row();
	    	$kafedra_id = $db->data['ID'];
	    	$sql = "SELECT * FROM predmet WHERE nam_predmet LIKE '" . $predmet . "'";
	    	$db->run($sql);
	    	$db->num_row();
	    	if($db->nrows){
	    		$db->row();
	    		$predmet_id = $db->data['ID'];
	    		$sql = "SELECT * FROM gruppa WHERE nam_gruppa LIKE '" . $gruppa. "'";
	    		$db->run($sql);
	    		$db->num_row();
	    		if($db->nrows){
	    			$db->row();
	    			$gruppa_id = $db->data['ID'];
	    			$sql = "SELECT * FROM para WHERE num_den LIKE '" . $day. "' AND num_par LIKE '" . $para. "' AND gruppa_id LIKE '" . $gruppa_id. "'";
	    			$db->run($sql);
	    			$db->num_row();
	    			if($db->nrows){
	    				$db->row();
	    				$para_id = $db->data['ID'];
	    				$sql = "SELECT * FROM para WHERE num_den LIKE '" . $day. "' AND num_par LIKE '" . $para. "' AND prepod_id LIKE '" . $prepod_id. "' AND predmet_id LIKE '" . $predmet_id. "' AND gruppa_id LIKE '" . $gruppa_id. "'";
	    				$db->run($sql);
	    				$db->num_row();
	    				if($db->nrows){
	    					echo 'Такая пара уже добавлена!!!';
	    				}else{
	    					$sql = "UPDATE `para` SET `prepod_id` = '".$prepod_id."', `predmet_id` = '".$predmet_id."' WHERE `para`.`ID` = ".$para_id;

	    					$db->run($sql);
	    					echo 'Пара успешно заменена!';
	    				}
	    				
	    			}else{
	    				$sql = "INSERT INTO `para` (`ID`,`num_den`, `num_par`,`prepod_id`,`predmet_id`,`gruppa_id`) VALUES (NULL,'".$day."','".$para."','".$prepod_id."','".$predmet_id."','".$gruppa_id."')";
	    				$db->run($sql);
	    				echo 'Пара успешно добавлена!';
	    			}

	    		}else{
	    			echo 'Ошибка необходимо ввести группу из выпадающего списка!!!';
	    		}

	    	}else{
	    		echo 'Ошибка необходимо ввести предмет из выпадающего списка!!!';
	    	}

	    }else{
	    	echo 'Ошибка необходимо ввести преподавателя из выпадающего списка!!!';
	    }
	
	}else{
		echo "Введите все поля!!!";
	}
	$db->stop();
?>