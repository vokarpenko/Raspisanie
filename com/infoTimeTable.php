<?php defined('INDEX') OR die('Прямой доступ к странице запрещён!');
	/* КОМПОНЕНТ СТРАНИЦЫ */
	
	$gruppa = $_GET['gruppa'];
	$subgroup = $_GET['subgroup'];
	$num_day = $_GET['nday'];
	$query = "SELECT * FROM `gruppa` WHERE `nam_gruppa`='".$gruppa."' AND `subgroup` = '".$subgroup."'";
	$db->run($query);
	$db->row();
	$gruppa_id = $db->data['ID'];
	$query2 = "SELECT  para.num_par, prepod.nam_prepod, predmet.nam_predmet FROM para  JOIN prepod on para.prepod_id = prepod.ID  JOIN predmet on para.predmet_id = predmet.ID JOIN gruppa on para.gruppa_id = gruppa.ID WHERE gruppa_id='".$gruppa_id."' AND num_den='".$num_day."'"  ;
	$db->run($query2);
	$db->num_row();

	$table = array();
	$table2 = array();
	for ($i = 0 ; $i < $db->nrows ; ++$i)
	{
	    $db->row();
	    $table[] = $db->data;
	}
	$sql = "SELECT  tpara.num_par, tprepod.nam_prepod, tpredmet.nam_predmet FROM tpara  JOIN tprepod on tpara.prepod_id = tprepod.ID  JOIN tpredmet on tpara.predmet_id = tpredmet.ID JOIN gruppa on tpara.gruppa_id = gruppa.ID WHERE gruppa_id='".$gruppa_id."' AND num_den='".$num_day."'"  ;
	$db->run($sql);
	$db->num_row();
	for ($i = 0 ; $i < $db->nrows ; ++$i)
	{
	    $db->row();
	    $table2[] = $db->data;
	}

	foreach ($table as $key => $value) {
		$num_par=$table[$key]['num_par'];
		foreach ($table2 as $key2 => $value2) {
			if($num_par = $table2[$key2]['num_par']){
				unset($table2[$key2]);
			}
		}
	}
	$table= array_merge($table,$table2);

	$db->stop();
?>