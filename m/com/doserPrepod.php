<?php
	//получаем данные через $_POSTи php
	define("INDEX", "");
	require_once($_SERVER['DOCUMENT_ROOT']."/cfg/core.php"); 
	session_start();

	$db = new MyDB();
	$db->connect();

	if ($_GET['keyword'] && !empty($_GET['keyword'])) {
	    // никогда не доверяйте входящим данным! Фильтруйте всё!
	    $word = $db->decode($_GET['keyword']);
	    
	   
		$sql = "SELECT nam_kafedra FROM kafedra WHERE nam_kafedra LIKE '%" . $word . "%' ORDER BY nam_kafedra";
	    // Получаем результаты
	    $db->run($sql);
	    $db->num_row();
	    if($db->nrows) {
	    	$end_result = '';
		    for ($i = 0 ; $i < $db->nrows ; ++$i)
	    	{
		        	$db->row();
		            $result         = $db->data['nam_kafedra'];

		            echo "<option     style ='display: none;'>" . $result . "</option>";
		           
	    	}
	    	 
    	}else {
	        echo '<option>Твою мать ничерта не найдено!!</option>';
	    }

	
	}
	$db->stop();
?>