 $( function() {
 	$( "#draggable1, #draggable2" ).draggable({ revert: "invalid" });

 	for (var i = 1; i < 50; i++) {
 		$( "#droppable"+i ).droppable({
 			classes: {
 				"ui-droppable-active": "ui-state-active",
 				"ui-droppable-hover": "ui-state-hover"
 			},
 			drop: function( event, ui ) {
        // $( this )
       
        $( ui.draggable).position({
  			my: "center",
  			at: "center",
 			of: this
		});
        	
    }

});
 	}

 } );