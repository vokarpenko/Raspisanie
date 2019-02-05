<?php
include_once 'db.php';	

$A = $_POST['action']; // del, upd, ins
$ID_USERS = SafeInt($_POST['ID_USERS']);

if ($A=='del') {
	/* пометка пользователя как удаленного */
	$stmt = $pdo->prepare("update USERS set US_DEL=NOW() where id_users=?");
	$stmt->execute(array($ID_USERS));	
} elseif ($A=='ins') {
	/* Режим добавления */
	$stmt = $pdo->prepare("insert into USERS (US_NAME, US_FIO, US_PASSMD5) values (?, ?, ?)");
	$stmt->execute(array($_POST['US_NAME'], $_POST['US_FIO'], $_POST['US_PASSMD5']));
	echo $pdo->lastInsertId();	
} elseif ($A=='upd') {
	/* Режим редактирования */
	if (isset($_POST['US_FIO'])) {
		$stmt = $pdo->prepare("update USERS set US_FIO=? where id_users=?");
		$stmt->execute(array($_POST['US_FIO'], $ID_USERS));	
	}
	if (isset($_POST['US_PASSMD5'])) {
		$US_PASSMD5 = substr($_POST['US_PASSMD5'],0,32);
		$stmt = $pdo->prepare("update USERS set US_PASSMD5=? where id_users=?");
		$stmt->execute(array($US_PASSMD5, $ID_USERS));	
	}
}