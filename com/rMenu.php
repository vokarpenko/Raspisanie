<?php

include($_SERVER['DOCUMENT_ROOT']."/com/head.php");
include($_SERVER['DOCUMENT_ROOT']."/com/bootstrap1.php");
session_start();
$_SESSION['login'] = 'admin';
?>
<link rel="stylesheet" href="../css/rMenu.css">
<title> Меню Разработчика </title>

<body>
	
	<div class="row">
		<div class="col-2">
		</div>
		<div class="col-8 box">
			
				
				<div id="jok">
					
						Меню разработчика
					
				</div>
				
			

			<div class="row">
				<div class="col-1">
					</div>
				<div class="col-10">
					<a href="../index.php?option=android" class="btn btn-primary btn-lg active pMenu" role="button" aria-pressed="true">Скачать андроид приложение</a>
				</div>
				<div class="col-1">
					</div>
			</div>
			<div class="row">
				<div class="col-1">
					</div>
				<div class="col-10">
					<a href="../index.php?option=add" class="btn btn-primary btn-lg active pMenu" role="button" aria-pressed="true">Добавить пару</a>
				</div>
				<div class="col-1">
					</div>
			</div>
			<div class="row">
				<div class="col-1">
					</div>
				<div class="col-10">
					<a href="../index.php?option=createRaspisanie" class="btn btn-primary btn-lg active pMenu" role="button" aria-pressed="true">Создать расписание</a>
				</div>
				<div class="col-1">
					</div>
			</div>
			<div class="row">
				<div class="col-1">
					</div>
				<div class="col-10">
					<a href="../index.php?option=Wishes" class="btn btn-primary btn-lg active pMenu" role="button" aria-pressed="true">Таблица пожеланий</a>
				</div>
				<div class="col-1">
					</div>
			</div>
		</div>
		<div class="col-2">
		</div>
	</div>
</body>
