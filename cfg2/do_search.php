<?php
	//получаем данные через $_POSTи php
	define("INDEX", "");
	require_once($_SERVER['DOCUMENT_ROOT']."/cfg/core.php"); 


	$db = new MyDB();
	$db->connect();

	if ( !empty($_GET['keyword'])&&$_GET['keyword']) {
	    // никогда не доверяйте входящим данным! Фильтруйте всё!
	    $word = $db->decode($_GET['keyword']);
	    $word2 = "";
	    
	    // Строим запрос
	    $tabl=""; $param=""; $param2="";
	    switch ($_GET['type']) {
	    	case "1":
		    	$tabl = "prepod";
		    	$param ="nam_prepod"; 
		    	break;
		    case "2":
		    	$tabl = "predmet";
		    	$param ="nam_predmet"; 
		    	break;
		    case "3":
		    	$tabl = "gruppa";
		    	$param ="nam_gruppa"; 
		    	break;
		    case "4":
		    	$tabl = "gruppa";
		    	$param ="subgroup"; 
		    	if (!empty($_GET['keyword2'])&& $_GET['keyword2']) {
	    			$word2=$db->decode($_GET['keyword2']);
	    		}
		    	break;
		}
		if($_GET['type']=="4"){
			$sql = "SELECT `subgroup` FROM `gruppa` WHERE `nam_gruppa` LIKE '".$word."%' AND `subgroup` LIKE '".$word2."%'";
		}
		else{
			$sql = "SELECT ".$param." FROM ".$tabl." WHERE ".$param." LIKE '" . $word . "%' ORDER BY ".$param;
		}
	    // Получаем результаты
	    $db->run($sql);
	    $db->num_row();
	    if($db->nrows) {
	    	$end_result = '';
		    for ($i = 0 ; $i < $db->nrows ; ++$i)
	    	{
		        	$db->row();
		            $result         = $db->data[$param];

		            echo "<option     style ='display: none;'>" . $result . "</option>";
	    	}
	    	 
    	}

	
	}
	$db->stop();
?>