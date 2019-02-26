<?php defined('INDEX') OR die('Прямой доступ к странице запрещён!');
	/* КОМПОНЕНТ СТРАНИЦЫ */
	
	$prepod = $_GET['prepod'];
	$num_day = $_GET['nday'];

	$query = "SELECT * FROM prepod WHERE nam_prepod='".$prepod."'";
	$db->run($query);
	$db->row();
	$prepod_id = $db->data['ID'];
	$query2 = "SELECT  para.num_par, predmet.nam_predmet FROM para  JOIN predmet on para.predmet_id = predmet.ID  WHERE prepod_id='".$prepod_id."' AND num_den='".$num_day."'"  ;
	$db->run($query2);
	$db->num_row();

	$table = array();
	$table2 = array();
	for ($i = 0 ; $i < $db->nrows ; ++$i)
	{
	    $db->row();
	    $table[] = $db->data;
	}
	
    

	$db->stop();
?>