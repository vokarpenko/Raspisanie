<title>
<?=$title?>
</title>
<h1>
<?=$h1?>
</h1>
  <script  src="/RaspisanieServer/js/script.js"></script>
<body>
<h3 style="text-align:center;">Попробуйте ввести слово ajax</h3>
<div id="container">
<div style="margin:20px auto; text-align: center;">
<form method="post" action="/RaspisanieServer/com/do_search.php">
    <input type="text" name="search" id="search_box" class='search_box'/>
    <input type="submit" value="Поиск" class="search_button" /><br />
</form>
</div>
<div>

<div id="searchresults">Результаты для <span class="word"></span></div>
<ul id="results" class="update">
</ul>

</div>
</div>

</body>