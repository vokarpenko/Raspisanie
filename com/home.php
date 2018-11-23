<link rel="stylesheet" type="text/css" href="\RaspisanieServer\css\home.css">
<script  src="/RaspisanieServer/js/tableDD.js"></script>
<div class="box">
<table border="1" >
<?php 
	for ($j = 0 ; $j < 10; ++$j)
    {
    	echo "<tr>";
		for ($i = 0 ; $i < 10; ++$i)
    	{
    		echo "<td id='drag1'><div id='drag2' class='draggable'><p> PARA </p></div></td>";
  		}
  		echo "</tr>";
  	}
?>
</table>
</div>