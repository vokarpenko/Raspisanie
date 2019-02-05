<?php
include_once 'db.php';	

if (isset($_POST['ACTION'])) {
	if ($_POST['ACTION']=='logout') {
		setcookie('US_SESSION', '');		
	}
}

if (isset($_POST['US_NAME'])and isset($_POST['US_PASSMD5'])) {
	$stmt = $pdo->prepare("select ID_USERS from USERS where US_NAME=? and US_DEL is null and US_PASSMD5=?");
	$stmt->execute(array($_POST['US_NAME'], $_POST['US_PASSMD5']));
	$result = $stmt->fetch();
	if ($result) {
		// valid login and pass
		$stmt = $pdo->prepare("update USERS set US_SESSION=? where ID_USERS=?");
		$US_SESSION = md5(date('dd-mm-yyyy').rand().$result['ID_USERS'].$_POST['US_NAME'].$_POST['US_PASSMD5']);
		$stmt->execute(array($US_SESSION, $result['ID_USERS'] ));

		setcookie('US_SESSION', $US_SESSION);
		setcookie('ID_USERS', $result['ID_USERS']);		
	} else {
		setcookie('US_SESSION', '');
	}
}
