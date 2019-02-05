<?php
	function check_mobile_device() { 
		$mobile_agent_array = array('ipad', 'iphone', 'android', 'pocket', 'palm', 'windows ce', 'windowsce', 'cellphone', 'opera mobi', 'ipod', 'small', 'sharp', 'sonyericsson', 'symbian', 'opera mini', 'nokia', 'htc_', 'samsung', 'motorola', 'smartphone', 'blackberry', 'playstation portable', 'tablet browser');
		$agent = strtolower($_SERVER['HTTP_USER_AGENT']);    
	    // var_dump($agent);exit;
		foreach ($mobile_agent_array as $value) {    
			if (strpos($agent, $value) !== false) return true;   
		}       
		return false; 
	} 

	# Функция для генерации случайной строки

	function generateCode($length=6) {

	    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";

	    $code = "";

	    $clen = strlen($chars) - 1;  
	    while (strlen($code) < $length) {

	            $code .= $chars[mt_rand(0,$clen)];  
	    }

	    return $code;

	}
?>