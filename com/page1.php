<?php defined('INDEX') OR die('Прямой доступ к странице запрещён!');
	/* КОМПОНЕНТ СТРАНИЦЫ */
	
	$gruppa = $_GET['gruppa'];
	$num_day = $_GET['nday'];

	$query = "SELECT * FROM gruppa WHERE nam_gruppa='".$gruppa."'";
	$db->run($query);
	$db->row();
	$gruppa_id = $db->data['ID'];
	$query2 = "SELECT  para.num_par, prepod.nam_prepod, predmet.nam_predmet FROM para  JOIN prepod on para.prepod_id = prepod.ID  JOIN predmet on para.predmet_id = predmet.ID JOIN gruppa on para.gruppa_id = gruppa.ID WHERE gruppa_id='".$gruppa_id."' AND num_den='".$num_day."'"  ;
	$db->run($query2);
	$db->num_row();

	// ПЕРЕМЕННЫЕ КОМПОНЕНТА
	
	// ЕСЛИ СТРАНИЦЫ НЕ СУЩЕСТВУЕТ
	$table = array();

	for ($i = 0 ; $i < $db->nrows ; ++$i)
    {
        $db->row();
        $table[] = $db->data;
    }
    $table1 = array();


	$db->stop();
?>