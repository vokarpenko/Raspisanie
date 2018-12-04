"use strict";
// этот код будет работать по современному стандарту ES5
$(document).ready(function (e) {
	$("#nam_kafedra").keyup( function () {
			
            var key = $(this).val();
 
            $.ajax({
                url:'/m/com/doserPrepod.php',
                type:'GET',
                data:'keyword='+key,
                
                success:function (data) {
                    $("#results1").html(data);
                    $("#results1").slideDown('fast');
                }
        	});
	});
});