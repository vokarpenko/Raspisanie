<?php
/* URL без параметров - режим добавления нового пользователя */
include_once 'db.php';	

$title = 'Карточка пользователя';
include_once 'header.php';

$ID_USERS = SafeInt($_GET['ID_USERS']);

?>
<script src="md5.js"></script>
<script type="application/javascript">
var ID_USERS = <?php echo $ID_USERS; ?>;
function SaveFIO() {
	$.ajax({
		type: "POST",
		data: ({action: "upd", ID_USERS: ID_USERS, US_FIO: $("#US_FIO").text() }),
		url: "user_.php",
		dataType: "html",
		success: function (data) {
			$("#FIOButton").hide();
		}
	})
}
function KeyFIO(e) {
	if(e.keyCode === 13){
		e.preventDefault();
		SaveFIO();
	} else {	
		$("#FIOButton").show();
	}
}
function DelUser() {
	$.ajax({
		type: "POST",
		data: ({action: "del", ID_USERS: ID_USERS }),
		url: "user_.php",
		dataType: "html",
		success: function (data) {
			location.href = location.href;
		}
	})
}
function SavePass() {
	$.ajax({
		type: "POST",
		data: ({action: "upd", ID_USERS: ID_USERS, US_PASSMD5: md5("<?php echo $salt; ?>"+$("#US_NAME").text()+$("#US_PASSMD5").val()) }),
		url: "user_.php",
		dataType: "html",
		success: function (data) {
			$("#PassButton").hide();
		}
	})
}
function KeyPass(e) {
	if(e.keyCode === 13){
		e.preventDefault();
		SavePass();
	} else {
		$("#PassButton").show();
	}
}

function Key13(e) {
	if(e.keyCode === 13){
		e.preventDefault();
	}
}
function AddUser() {
	$.ajax({
		type: "POST",
		data: ({action: "ins", ID_USERS: 0, US_PASSMD5: md5("<?php echo $salt; ?>"+$("#US_NAME").text()+$("#US_PASSMD5").val()), US_FIO: $("#US_FIO").text(), US_NAME : $("#US_NAME").text() }),
		url: "user_.php",
		dataType: "html",
		success: function (data) {
			location.href = location.href + "?ID_USERS="+data;
		}
	})
}
</script>
<?php
if ($ID_USERS==0) {
	?>
	<table>
	<tr><td align="center" colspan="2" class="ro">Новый пользователь</td></tr>
	<tr><th>Логин</th><td id="US_NAME" contenteditable="true" onkeypress="Key13(event)"></td></tr>
	<tr><th>ФИО</th><td id="US_FIO" contenteditable="true" onkeypress="Key13(event)"></td></tr>
	<tr><th>Пароль</th><td><input type="password" id="US_PASSMD5" onkeypress="Key13(event)" style="border:none" value="" /></td></tr>
	<tr><td align="center" colspan="2"><button onclick="AddUser()">Сохранить</button></td></tr>
	</table>	
	<?php
} else {
  $stmt = $pdo->query("select US_NAME, US_FIO, US_DEL from USERS where id_users=".$ID_USERS);
  while ($row = $stmt->fetch()) {
	echo '<table>';
	echo '<tr><th>ID_USERS</th><td class="ro">'.$ID_USERS.'</td><td>'; if ($row['US_DEL']) { echo 'Удален: '.$row['US_DEL']; } else { echo '<button onclick="DelUser()">Удалить</button>';} echo '</td></tr>';
	echo '<tr><th>Логин</th><td id="US_NAME">'.$row['US_NAME'].'</td></tr>';
	echo '<tr><th>ФИО</th><td id="US_FIO" contenteditable="true" onkeypress="KeyFIO(event)">'.$row['US_FIO'].'</td><td><button id="FIOButton" onclick="SaveFIO()">Сохранить</button></td></tr>';
	echo '<tr><th>Пароль</th><td><input placeholder="новый пароль" type="password" id="US_PASSMD5" onkeypress="KeyPass(event)" style="border:none" value="" /></td><td><button id="PassButton" onclick="SavePass()">Сохранить</button></td></tr>';
	echo '</table>';
  }
}

include_once 'footer.php';
