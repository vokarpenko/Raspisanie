$(document).ready(function(){
    $("#department").autocomplete({
  source: "/m/com/doserPrepod.php", // url-адрес
  minLength: 2 // минимальное количество для совершения запроса
});
});