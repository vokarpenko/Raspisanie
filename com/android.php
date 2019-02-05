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
        if(!@$_POST['not_attach_ip'])
        {
            # Если пользователя выбрал привязку к IP
            # Переводим IP в строку
            $insip = ", user_ip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";
        }
        # Записываем в БД новый хеш авторизации и IP
        $db->run("UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$db->data['user_id']."'");
        # Ставим куки
        setcookie("id", $db->data['user_id'], time()+60*60*24*30);
        setcookie("hash", $hash, time()+60*60*24*30);
        # Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: /com/androidProverka.php"); exit();
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }
}
$db->stop();
?>


<form method="POST">

Логин <input name="login" type="text"><br>

Пароль <input name="password" type="password"><br>

Не прикреплять к IP(не безопасно) <input type="checkbox" name="not_attach_ip"><br>

<input name="submit" type="submit" value="Войти">

</form>
