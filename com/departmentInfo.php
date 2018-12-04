<?php defined('INDEX') OR die('Прямой доступ к странице запрещён!');
	/* КОМПОНЕНТ СТРАНИЦЫ */
	

	$query = "SELECT nam_kafedra FROM kafedra";
	$db->run($query);
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