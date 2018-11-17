<?php
	//получаем данные через $_POST
	define("INDEX", "");
	require_once($_SERVER['DOCUMENT_ROOT']."RaspisanieServer/cfg/core.php"); 
	session_start();

	$db = new MyDB();
	$db->connect();

	if (isset($_POST['search'])) {
	    // никогда не доверяйте входящим данным! Фильтруйте всё!
	    $word = $db->decode($_POST['search']);
	    // Строим запрос
	    $sql = "SELECT nam_prepod FROM prepod WHERE nam_prepod LIKE '%" . $word . "%' ORDER BY nam_prepod";
	    // Получаем результаты
	    $db->run($sql);
	    $db->num_row();
	    if($db->nrows) {
	    	$end_result = '';
		    for ($i = 0 ; $i < $db->nrows ; ++$i)
	    	{
		        	$db->row();
		            $result         = $db->data['nam_prepod'];
		            $bold           = '<span class="found">' . $word . '</span>';
		            $end_result     .= '<li>' . str_ireplace($word, $bold, $result) . '</li>';
	    	}
	    	echo $end_result;
    	}else {
	        echo '<li>По вашему запросу ничего не найдено</li>';
	    }

	
	}
	$db->stop();
?>