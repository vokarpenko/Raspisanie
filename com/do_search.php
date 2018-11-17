<?php
	//получаем данные через $_POSTи php
	define("INDEX", "");
	require_once($_SERVER['DOCUMENT_ROOT']."RaspisanieServer/cfg/core.php"); 
	session_start();

	$db = new MyDB();
	$db->connect();

	if ($_GET['keyword'] && !empty($_GET['keyword'])) {
	    // никогда не доверяйте входящим данным! Фильтруйте всё!
	    $word = $db->decode($_GET['keyword']);
	    // Строим запрос
	    $tabl=""; $param="";
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
		}
		$sql = "SELECT ".$param." FROM ".$tabl." WHERE ".$param." LIKE '" . $word . "%' ORDER BY ".$param;
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
	    	 
    	}else {
	        echo '<option>Твою мать ничерта не найдено!!</option>';
	    }

	
	}
	$db->stop();
?>