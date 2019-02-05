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
        include($_SERVER['DOCUMENT_ROOT']."/com/wishes.php");
       
    }
}
else
{
    print "Включите куки";
}
?>