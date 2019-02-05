<html>
 <head>
 <link rel="stylesheet" href="/doc/main.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title><?php echo $title; ?></title>
 </head>
 <body>
 
 
<script type="text/javascript">
  function show_user_menu() { document.getElementById('user_menu').className='show'; }
  function hide_user_menu() { document.getElementById('user_menu').className='hide'; }
  function logout() {
	$.ajax({
		type: "POST",
		data: ({ACTION: "logout" }),
		url: "login_.php",
		dataType: "html",
		success: function (data) {
			location.href = location.href;
		}
	})
  }
</script> 
<div style="background:White; border-bottom-style: solid;" width="100%">
<div>Menu</div>
</div>
<div style="width:100px; float:right; background:LightGreen; position:absolute; top:8px; right:8px;" onmouseover="show_user_menu()" onmouseout="hide_user_menu()"><?php echo $US_NAME; ?></div>
<div id="user_menu" onmouseover="show_user_menu()" onmouseout="hide_user_menu()" class="hide" style="width:100px; background-color:#E8FED8; float:right; background:LightGreen; position:absolute; top:26px; right:8px;">
  <button style="width:100%" onclick="logout()">Выход</button>
</div>
