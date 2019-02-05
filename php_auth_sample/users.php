<?php
include_once 'db.php';
$title = 'Пользователи';
include_once 'header.php';
?>
<script type="text/javascript">
  function Open(ID_USERS) {
	document.location.href = "/doc/user.php?ID_USERS="+ID_USERS;
  }
</script><?php

echo '<table><tr><th>ID</th><th>Логин</th><th>ФИО</th><th>Добавлен</th></tr>';
$stmt = $pdo->query("SELECT ID_USERS, US_NAME, US_FIO, US_INS FROM USERS where US_DEL is null ORDER BY ID_USERS");
while ($row = $stmt->fetch()) {
	echo '<tr><td>'.$row['ID_USERS'].'</td><td>'.$row['US_NAME'].'</td><td>'.$row['US_FIO'].'</td><td>'.$row['US_INS'].'</td><td><button onclick="Open('.$row['ID_USERS'].')">Карточка</button></td></tr>';
}
echo '<tr><td align="center" colspan="4"><a href="user.php">Добавление нового пользователя</a></td></tr></table>';

include_once 'footer.php';
