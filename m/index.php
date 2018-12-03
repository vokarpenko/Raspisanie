
<?php
// echo "<pre>HELLO MOBILE!</pre>";
include($_SERVER['DOCUMENT_ROOT']."/m/com/head.php");

if(!empty($_GET['option'])){
	switch ($_GET['option']) {
		case "prepod":
		include($_SERVER['DOCUMENT_ROOT']."/m/com/prepod.php");
		break;

		case "student":
		include($_SERVER['DOCUMENT_ROOT']."/m/com/student.php");
		break;

		case "home":
		include($_SERVER['DOCUMENT_ROOT']."/m/com/home.php");
		break;

	

		default:
		include($_SERVER['DOCUMENT_ROOT']."/m/com/home.php");
		break;
	}
}
else{

	include($_SERVER['DOCUMENT_ROOT']."/m/com/home.php");
}
?>

