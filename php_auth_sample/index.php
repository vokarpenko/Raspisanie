<html>
 <head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Таблица</title>
  <style type="text/css">
   TABLE {
    width: 600px; /* Ширина таблицы */
    border-collapse: collapse; /* Убираем двойные линии между ячейками */
   }
   TD, TH {
    padding: 3px; /* Поля вокруг содержимого таблицы */
    border: 1px solid #C0C0C0; /* Параметры рамки */
   }
   TH {
    background: #b0e0e6; /* Цвет фона */
   }
   .marked
	{
		background: #B9FF9F;
	}
   .issued
	{
		background: #FFFF99;
	}
   .dates div {
	float: left;
	padding: 4px;
   }
  </style>
 </head>
 <body>
<?php
/*require_once('firebird.php');*/

$db = mysqli_connect("127.0.0.1", "DOC", "12qwas", "DOC");

if ($results = mysqli_query($db, "SELECT ID_USERS, US_NAME FROM USERS ORDER BY ID_USERS")) {
	echo '<table>';
	foreach ($results as $row) {
		echo '<tr><td>'.$row['ID_USERS'].'</td><td>'.$row['US_NAME'].'</td></tr>';
	}
	echo "</table>";	
}

mysqli_close($db);

/*
$result = ibase_query("select first 10 id_knames, nm_name from knames");
echo "<table>";
while ($row = ibase_fetch_row($result)) {
	echo "<td>".$row[0]."</td>";
	echo "<td>".$row[1]."</td>";
	echo "</tr>";
}
echo "</table>";
ibase_close($db);*/

?>
</body></html>