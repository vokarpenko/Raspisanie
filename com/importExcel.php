

	<link rel="stylesheet" type="text/css" href="/m/css/skeleton.css">
	<link rel="stylesheet" type="text/css" href="/m/css/normalize.css">	
	<script src="/js/importExcel.js"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<style>
   		/*описание стилей*/
   		#loadImg{position:absolute; z-index:1000; display:none}
  	</style>
<title>ImportFromExcel</title>

<div class ="container" >
	<h1 style="padding-top: 30px;padding-bottom: 30px">ImportFromExcel</h1>
	<form>
	  <div class="row">
	    <div class="two columns">
	      <label for="exampleEmailInput">Название листа</label>
	      <input class="u-full-width" type="text" placeholder="listName" id="listName" value="3,4 курсы">
	    </div>
	    <div class="three columns">
	      <label for="exampleRecipientInput">Добавьте файл для импорта</label>
	      <input class="button-primary" type="file" id ="ExcelFile">
	    </div>
	    
	  
	  	<div class="four columns">
	      <label for="exampleEmailInput">Введите букву столбца дня недели</label>
	      <input class="u-full-width" type="text" placeholder="Пример A" id="dayOfWeek" value="A">
	    </div>
	    <div class="three columns">
	      <label for="exampleEmailInput">Аналогично пары часов</label>
	      <input class="u-full-width" type="text" placeholder="Пример B" id="numOfPar" value="C">
	    </div>
	  </div>
	   <div class="row" style="padding-top:20px">
		   	<div class="three columns">
		      <label for="exampleEmailInput">Введите название группы</label>
		      <input class="u-full-width" type="text" placeholder="Пример 42 группа" id="nameOfGroup" value="42 группа" >
		    </div>
		    <div class="two columns">
		      <label for="exampleEmailInput">Подгруппа</label>
		      <input class="u-full-width" type="text" placeholder="Пример КИТ" id="subgroup" value="КММ" >
		    </div>
		    <div class="seven columns">
		      <label for="exampleEmailInput">Введите верхнюю левую ячейку группы</label>
		      <input class="u-full-width" type="text" placeholder="Пример B2" id="mainGroup" value="AA15">
		    </div>
	   </div>
	   <div class="row" style="padding-top:20px">
	   	
	  		<a class="button button-primary" href="#" id="buttonSend">импорт</a>
	   </div>
	</form>
	<img id="loadImg" src="/img/load.gif" />
	<iframe width="560" height="315" src="https://www.youtube.com/embed/OGxlGo9fE5Y" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	<div id="log"></div>

</div>



