<?php
// Страница авторизации
if(isset($_POST['submit']))
{
    # Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = "SELECT user_id, user_password FROM users WHERE user_login='".$db->decode($_POST['login'])."' LIMIT 1";
    $db->run($query);
    $db->row();
    # Сравниваем пароли
    if($db->data['user_password'] === md5(md5($_POST['password'])))
    {
        # Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));
        # Записываем в БД новый хеш авторизации и IP
        $db->run("UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$db->data['user_id']."'");
        # Ставим куки
        setcookie("id", $db->data['user_id'], time()+60*60*24*30);
        setcookie("hash", $hash, time()+60*60*24*30);
        # Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: /com/wishesCheck2.php"); exit();
    }
    else
    {
        // print "Вы ввели неправильный логин/пароль";
        echo "<script>
                $(function() {
                  $('#log').text('Вы ввели неправильный логин/пароль');
                });
              </script>;";

    }
}
$db->stop();
?>


<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Вход в таблицу преподавателей</title>
	<link rel="stylesheet" href="../css/wishesCheck.css">

</head>
<body>



  <section class="container">
    <div class="login">
      <h1>Войти в таблицу преподавателей</h1>
      <form method="post" >
        <p><input type="text" name="login" value="" placeholder="Логин или Email"></p>
        <p><input type="password" name="password" value="" placeholder="Пароль"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Запомнить меня
          </label>
        </p>
        <p class="submit"><input id= "submit1" type="submit" name="submit" value="Войти"></p>
        <br>
        <div id="log"></div>
      </form>
    </div>

  </section>


</body>
</html>
