$(document).ready(function (e) {
    $("#buttonSend").click( function () {

        var sbPrepod = $("#sbPrepod").val();
        var sbPredmet = $("#sbPredmet").val();
        var sbGruppa = $("#sbGruppa").val();
        var sDay = $("#selectDay").val();
        var sPar = $("#selectPar").val();
        $.ajax({
                url:'/com/addInDB.php',
                type:'GET',
                data:'prepod='+sbPrepod+'&predmet='+sbPredmet+'&gruppa='+sbGruppa+'&day='+sDay+'&para='+sPar,
                success:function (data) {
                    $("#resultInfo").html(data);
                    
                }
        });       
    })
});