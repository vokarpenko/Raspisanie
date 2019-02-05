<?php

/* OUT: ID_USERS<>0 => authorised */
$ID_USERS = 0; $US_FIO = ''; $US_NAME = '';
if (isset($_COOKIE['US_SESSION'])and(isset($_COOKIE['ID_USERS']))) {
	$stmt = $pdo->prepare("select US_NAME, US_FIO from USERS where ID_USERS=? and US_DEL is null and US_SESSION=?");
	$stmt->execute(array($_COOKIE['ID_USERS'], $_COOKIE['US_SESSION']));
	$result = $stmt->fetch();
	if ($result) {
		$ID_USERS = $_COOKIE['ID_USERS'];
		$US_FIO = $result['US_FIO'];
		$US_NAME = $result['US_NAME'];
	}
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if ($ID_USERS==0) {
	$title = "";
	include_once 'header.php';	
	?>
	<script src="md5.js"></script>	
	<script type="application/javascript">
	function Key13(e) {
		if(e.keyCode === 13){
			e.preventDefault();
		}
	}
	function Login() {
		$.ajax({
			type: "POST",
			data: ({US_PASSMD5: md5("<?php echo $salt; ?>"+$("#US_NAME").text()+$("#US_PASSMD5").val()), US_NAME : $("#US_NAME").text() }),
			url: "login_.php",
			dataType: "html",
			success: function (data) {
				location.href = location.href;
			}
		})
	}
	</script>
	<table>
	<tr><th>Пользователь:</th><td id="US_NAME" contenteditable="true" onkeypress="Key13(event)"></td></tr>
	<tr><th>Пароль:</th><td><input type="password" id="US_PASSMD5" onkeypress="Key13(event)" style="border:none" value="" /></td></tr>
	<tr><td align="center" colspan="2"><button onclick="Login()">Вход</button></td></tr>
	</table>
	</body></html>
	<?php
	exit;
  }
}

?>