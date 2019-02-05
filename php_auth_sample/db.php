<?php

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO("mysql:host=127.0.0.1;dbname=DOC;charset=utf8", "DOC", "123456", $opt);
$salt = 'fjk3*[4435345weeew123sd3';

include_once 'function.php';
include_once 'login.php';

?>