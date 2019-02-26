<?php 
	define("INDEX", "");
    require_once($_SERVER['DOCUMENT_ROOT']."/cfg/core.php"); 
    $db = new MyDB();
    $db->connect();
    if($_POST['ver']==1){
	    foreach ($_POST['b'] as $key=>$value) {
		  	$sql1 = " DELETE FROM prepod WHERE ID = '".$value."'";
		  	$sql2 = " DELETE FROM wishes WHERE prepod_id = '".$value."'";
		 	$db->run($sql1);
			$db->run($sql2);
			
		
		}
	}	
	if($_POST['ver']==2){
	    foreach ($_POST['b'] as $key=>$value) {
		  	$sql1 = " DELETE FROM predmet WHERE ID = '".$value."'";
		  	
		 	$db->run($sql1);
			
			
		
		}
	}	
	if($_POST['ver']==3){
	    foreach ($_POST['b'] as $key=>$value) {
		  	$sql1 = " DELETE FROM gruppa WHERE ID = '".$value."'";
		  	
		 	$db->run($sql1);
			
			
		
		}
	}	
	
?>