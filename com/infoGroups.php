<?php defined('INDEX') OR die('Прямой доступ к странице запрещён!');
	/* КОМПОНЕНТ СТРАНИЦЫ */
	
	

	$query = "SELECT nam_gruppa,subgroup FROM gruppa";
	$db->run($query);

	$db->num_row();

	$table = array();

	for ($i = 0 ; $i < $db->nrows ; ++$i)
	{
	    $db->row();
	    $table[] = $db->data;
	}
	
    

	$db->stop();
?>