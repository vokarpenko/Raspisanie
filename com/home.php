<link rel="stylesheet" type="text/css" href="/css/home.css">
<script  src="/js/tableDD.js"></script>
<body>
	<div id ="box">

		<div id="draggable1" class="ui-widget-content draggable">
			<p>1</p>
		</div>
		<div id="draggable2" class="ui-widget-content draggable">
			<p>2</p>
		</div>
		<table border="2">
			<?php 
			
			for ($i = 1 ; $i < 10; ++$i)
			{
				echo "<tr>";
				for ($j = 1 ; $j <= 5; ++$j)
				{
					echo "<td id='joke'>
					<div id='droppable".($i*5+$j)."' class='ui-widget-header droppable' >
					<p>+</p>
					</div>
					</td>";
					
				}
				echo "</tr>";
			}
			?>
		</table>
		

	</div>
</body>