
  $(document).ready(function (e) {
    $( "#tabs" ).tabs();
    $( "#selectable1" ).selectable();
    $( "#selectable2" ).selectable();
    $( "#selectable3" ).selectable();


    $( "#dialog-confirm1" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        "Удалить": function() {
		        var a ="";
		    	var data = new Object();
		    	var i = 0;
				$("#selectable1").find("li").each(function(i,elem) {

					if (! $(this).hasClass("ui-selected")) {
						a+="<li class='ui-widget-content'>"+ $(this).text()+"</li>";
					}
					else{
						var s = $(this).text().split(" "); 
						data['b[' + i + ']'] = s[0];
						i++;
					}
					data['ver']=1;
				});
				$("#selectable1").html(a);

		       
		        $.ajax({
		                url:'/cfg2/deleteFrDict.php',
		                type:'POST',
		                data:data,
		                success:function (data) {
		                    
		                    $("#tabs-1").attr("height",$("#selectable1").attr("height"));
		                }
		        });       
		        $( this ).dialog( "close" );
        },
        "Отмена": function() {
          $( this ).dialog( "close" );
        }
      }
    });
    $( "#dialog-confirm2" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        "Удалить": function() {
		        var a ="";
		    	var data = new Object();
		    	var i = 0;
				$("#selectable2").find("li").each(function(i,elem) {

					if (! $(this).hasClass("ui-selected")) {
						a+="<li class='ui-widget-content'>"+ $(this).text()+"</li>";
					}
					else{
						var s = $(this).text().split(" "); 
						data['b[' + i + ']'] = s[0];
						i++;
					}
					data['ver']=2;
				});
				$("#selectable2").html(a);

		       
		        $.ajax({
		                url:'/cfg2/deleteFrDict.php',
		                type:'POST',
		                data:data,
		                success:function (data) {
		                   
		                    $("#tabs-2").attr("height",$("#selectable2").attr("height"));
		                }
		        });       
		        $( this ).dialog( "close" );
        },
        "Отмена": function() {
          $( this ).dialog( "close" );
        }
      }
    });
    $( "#dialog-confirm3" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        "Удалить": function() {
		        var a ="";
		    	var data = new Object();
		    	var i = 0;
				$("#selectable3").find("li").each(function(i,elem) {

					if (! $(this).hasClass("ui-selected")) {
						a+="<li class='ui-widget-content'>"+ $(this).text()+"</li>";
					}
					else{
						var s = $(this).text().split(" "); 
						data['b[' + i + ']'] = s[0];
						i++;
					}
					data['ver']=3;
				});
				$("#selectable3").html(a);

		       
		        $.ajax({
		                url:'/cfg2/deleteFrDict.php',
		                type:'POST',
		                data:data,
		                success:function (data) {
		                    
		                    $("#tabs-3").attr("height",$("#selectable3").attr("height"));
		                }
		        });       
		        $( this ).dialog( "close" );
        },
        "Отмена": function() {
          $( this ).dialog( "close" );
        }
      }
    });
    $( "#dialog-confirm1" ).dialog("close");
    $( "#dialog-confirm2" ).dialog("close");
    $( "#dialog-confirm3" ).dialog("close");
    $.ajax({
                url:'/cfg2/printInDict.php',
                type:'POST',
                data:'ver=1',
                success:function (data) {
                    $("#selectable1").html(data);
                    $("#tabs-1").attr("height",$("#selectable1").attr("height"));
                }
    });
    $.ajax({
                url:'/cfg2/printInDict.php',
                type:'POST',
                data:'ver=2',
                success:function (data) {
                    $("#selectable2").html(data);
                    $("#tabs-2").attr("height",$("#selectable2").attr("height"));
                }
    });
    $.ajax({
                url:'/cfg2/printInDict.php',
                type:'POST',
                data:'ver=3',
                success:function (data) {
                    $("#selectable3").html(data);
                    $("#tabs-3").attr("height",$("#selectable3").attr("height"));
                }
    });

   

    $( "#dialog-form2" ).dialog({
      autoOpen: false,
      height: 400,
      width: 350,
      modal: true,
      buttons: {
        "Добавить":function() {
         	$.ajax({
                url:'/cfg2/addInDict.php',
                type:'POST',
                data:'ver=1&name='+$('#name1').val(),
                success:function (data) {
                	if(data!=""){
	                    $("#selectable2").html($("#selectable2").html()+"<li class='ui-widget-content'>"+data+"</li>");
	                    $("#tabs-2").attr("height",$("#selectable2").attr("height"));

	                }

                }
    		});
    		$(this).dialog( "close" );

     	},
        "Отмена": function() {
          	$(this).dialog( "close" );
        }
      }
      
    });

    $( "#dialog-form3" ).dialog({
      autoOpen: false,
      height: 400,
      width: 350,
      modal: true,
      buttons: {
        "Добавить":function() {
         	$.ajax({
                url:'/cfg2/addInDict.php',
                type:'POST',
                data:'ver=2&name='+$('#name2').val(),
                success:function (data) {
                	if(data!=""){
	                    $("#selectable3").html($("#selectable3").html()+"<li class='ui-widget-content'>"+data+"</li>");
	                    $("#tabs-3").attr("height",$("#selectable3").attr("height"));
	                }
                }
    		});
    		$(this).dialog( "close" );
     	},
        "Отмена": function() {
          	$(this).dialog( "close" );
        }
      }
      
    });

    $( "#buttonPlus2" ).on( "click", function() {
      $("#dialog-form2").dialog( "open" );
    });

    $( "#buttonPlus3" ).on( "click", function() {
      $("#dialog-form3").dialog( "open" );
    });

    $("#buttonDelete1").click( function () {
    	$( "#dialog-confirm1" ).dialog("open");
    	
    })
    $("#buttonDelete2").click( function () {
    	$( "#dialog-confirm2" ).dialog("open");
    	
    })
    $("#buttonDelete3").click( function () {
    	$( "#dialog-confirm3" ).dialog("open");
    	
    })

  });



