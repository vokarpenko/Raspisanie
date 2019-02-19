

	<link rel="stylesheet" type="text/css" href="/m/css/skeleton.css">
	<link rel="stylesheet" type="text/css" href="/m/css/normalize.css">	
	<script src="/js/importExcel.js"></script>

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
		   	<div class="four columns">
		      <label for="exampleEmailInput">Введите название группы</label>
		      <input class="u-full-width" type="text" placeholder="Пример 41 группа КИТ" id="nameOfGroup" value="32 группа КИТ" >
		    </div>
		    <div class="eight columns">
		      <label for="exampleEmailInput">Введите верхнюю левую ячейку группы(внутри неё должно быть название пары)</label>
		      <input class="u-full-width" type="text" placeholder="Пример B2" id="mainGroup" value="M15">
		    </div>
	   </div>
	   <div class="row" style="padding-top:20px">
	   	
	  		<a class="button button-primary" href="#" id="buttonSend">импорт</a>
	   </div>
	</form>
	<div id="log"></div>
</div>



