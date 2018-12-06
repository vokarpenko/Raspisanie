<?php
	//получаем данные через $_POSTи php
	define("INDEX", "");
	require_once($_SERVER['DOCUMENT_ROOT']."/cfg/core.php"); 
	$db = new MyDB();
	$db->connect();

	
	    // никогда не доверяйте входящим данным! Фильтруйте всё!
	    $word = $db->decode($_GET['term']);
	    
	   
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
		            if($i != 0){
		            	$end_result .=  ",\"".$result."\"";
		            }
		            else{
		            	$end_result .=  "\"".$result."\"";
		            }
		            
		           
	    	}
	    	 echo "[". $end_result."]";
    	}

	
	
	$db->stop();
?>