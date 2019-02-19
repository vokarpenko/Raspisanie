
$(document).ready(function (e) {
    // Переменная куда будут располагаться данные файлов
 
    var files;
     
    // Вешаем функцию на событие
    // Получим данные файлов и добавим их в переменную
     
    $('#ExcelFile').change(function(){
        files = this.files;
    });

    $("#buttonSend").click( function () {
        
        event.stopPropagation(); // Остановка происходящего
    event.preventDefault();  // Полная остановка происходящего
    
        //не забывайти проверить поля на заполнение
        //код проверки полей опустим, он к статье не имеет отнашение

        //присоединяем наш файл
        var formData = new FormData();
        
        $.each(files, function(i, file) {
            formData.append("ExcelFile", file);
        });

        //присоединяем остальные поля
        formData.append('listName', $('#listName').val());
        formData.append('dayOfWeek', $('#dayOfWeek').val());
        formData.append('numOfPar', $('#numOfPar').val());
        formData.append('nameOfGroup', $('#nameOfGroup').val());
        formData.append('mainGroup', $('#mainGroup').val());
        //отправляем через ajax
        $.ajax({
            url: "/cfg2/importExcelDB.php",
            type: "POST",
            //dataType : "json", 
            cache: false,
            contentType: false,
            processData: false,         
            data: formData, //указываем что отправляем
            success: function(data){
                $("#log").html(data);
            },
            error: function( jqXHR, textStatus, errorThrown ){
                console.log('ОШИБКИ AJAX запроса: ' + textStatus );
            }
        });
    });
});