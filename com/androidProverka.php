<?php

// Скрипт проверки


# Соединямся с БД

define("INDEX", "");
require_once($_SERVER['DOCUMENT_ROOT']."/cfg/core.php"); 
require_once($_SERVER['DOCUMENT_ROOT']."/com/library.php");
$db = new MyDB();
$db->connect();


if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))

{   

    $query = "SELECT *,INET_NTOA(user_ip) FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1";
    $db->run($query);
    $db->row();


    if(($db->data['user_hash'] !== $_COOKIE['hash']) or ($db->data['user_id'] !== $_COOKIE['id']) or (($db->data['user_ip'] !== $_SERVER['REMOTE_ADDR'])  and ($db->data['user_ip'] !== "0")))

    {

        setcookie("id", "", time() - 3600*24*30*12, "/");

        setcookie("hash", "", time() - 3600*24*30*12, "/");

        print "Хм, что-то не получилось";

    }

    else

    {

        print "Привет, ".$db->data['user_login'].". Всё работает!";

        if (  ! $_FILES  )
        {   
            echo '
          <h2>Форма для загрузки файлов</h2>
          <form action="" method="post" enctype="multipart/form-data">
          <input type="file" name="filename"><br>
          <input type="submit" value="Загрузить"><br>
          </form>
            ';
        }
        else{
           
         if(  is_uploaded_file($_FILES['filename']['tmp_name'])  )
         {

        // Если файл загружен успешно, перемещаем его
        // из временной директории в конечную
            $dir=$_SERVER['DOCUMENT_ROOT']."/m/app";
            $nam=$_FILES["filename"]["name"];
            move_uploaded_file
            (
            $_FILES["filename"]["tmp_name"],
            "$dir/$nam"
            );
        } 
        else {
            echo('Ошибка загрузки файла');
        }
    }


    
}

}

else

{

    print "Включите куки";

}
?>