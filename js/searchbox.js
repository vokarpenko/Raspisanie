"use strict";
// этот код будет работать по современному стандарту ES5
$(document).ready(function (e) {
	$("#sbPrepod").keyup( function () {
			
            var key = $(this).val();
 
            $.ajax({
                url:'/cfg2/do_search.php',
                type:'GET',
                data:'keyword='+key+'&type=1',
                
                success:function (data) {
                    $("#results1").html(data);
                    $("#results1").slideDown('fast');
                }
        	});
	});
	$("#sbPredmet").keyup( function () {
			$("here").show();
            var key = $(this).val();
 
            $.ajax({
                url:'/cfg2/do_search.php',
                type:'GET',
                data:'keyword='+key+'&type=2',
                success:function (data) {
                    $("#results2").html(data);
                    $("#results2").slideDown('fast');
                }
        	});
	});
	$("#sbGruppa").keyup( function () {
			$("here").show();
            var key = $(this).val();
 
            $.ajax({
                url:'/cfg2/do_search.php',
                type:'GET',
                data:'keyword='+key+'&type=3',
                success:function (data) {
                    $("#results3").html(data);
                    $("#results3").slideDown('fast');
                }
        	});
	});
    $("#sbPodgruppa").keyup( function () {
            $("here").show();
            var key = $(this).val();
            var key2 = $("#sbGruppa").val();
 
            $.ajax({
                url:'/cfg2/do_search.php',
                type:'GET',
                data:'keyword='+key2+'&type=4&keyword2='+key,
                success:function (data) {
                    $("#results4").html(data);
                    $("#results4").slideDown('fast');
                },
                error: function( jqXHR, textStatus, errorThrown ){
                    
                    console.log('ОШИБКИ AJAX запроса: ' + textStatus );
                }
            });
    });
	


});