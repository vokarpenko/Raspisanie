<?php
	//получаем данные через $_POSTи php
	define("INDEX", "");
	require_once($_SERVER['DOCUMENT_ROOT']."/cfg/core.php"); 


	$db = new MyDB();
	$db->connect();
	if($_POST['ver']==1){
		$sql = " SELECT * FROM predmet where nam_predmet = '".$_POST['name']."'";
      	$db->run($sql);
      	$db->num_row();
      	if(!$db->nrows){
			$sql = "INSERT INTO `predmet` (`ID`,`nam_predmet`) VALUES (NULL,'".$_POST['name']."')";
			$db->run($sql);
			$sql = " SELECT * FROM predmet where nam_predmet = '".$_POST['name']."'";
	      	$db->run($sql);
	      	
	      	$db->row();
	      	$prepod_id = $db->data['ID'];
        	$fio = $db->data['nam_predmet'];
			echo $prepod_id." ".$fio;
		}
		else{
			echo "";
		}
	}	
	if($_POST['ver']==2){
		$sql = " SELECT * FROM gruppa where nam_gruppa = '".$_POST['name']."' AND subgroup = '".$_POST['subgroup']."'";
      	$db->run($sql);
      	$db->num_row();
      	if(!$db->nrows){
			$sql = "INSERT INTO `gruppa` (`ID`,`nam_gruppa`,`subgroup`) VALUES (NULL,'".$_POST['name']."','".$_POST['subgroup']."')";
			$db->run($sql);
			$sql = " SELECT * FROM gruppa where nam_gruppa = '".$_POST['name']."' AND subgroup = '".$_POST['subgroup']."'";;
	      	$db->run($sql);
	      	
	      	$db->row();
	      	$prepod_id = $db->data['ID'];
        	$fio = $db->data['nam_gruppa'];
        	$subgr=$db->data['subgroup'];
			echo $prepod_id." ".$fio." ".$subgr;
		}
		else{
			echo "";
		}
	}	
?>