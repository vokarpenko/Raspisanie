 function infoWindow1(text){

 	$( 

 		function() {
 			$("#dialog1").html(text);
 			$( "#dialog1" ).dialog({
 				modal: true,
 				buttons: {
 					Ok: function() {
 						$( this ).dialog( "close" );
 					}

 				}
 			});
 		} );
 }
 function infoWindow2(text){

 	$( 

 		function() {
 			$("#dialog2").html(text);
 			$( "#dialog2").dialog({
 				modal: true,
 				buttons: {
 					Ok: function() {
 						$( this ).dialog( "close" );
 					}

 				}
 			});
 		} );
 }