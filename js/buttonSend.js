$(document).ready(function (e) {
    $("#buttonSend").click( function () {

        var sbPrepod = $("#sbPrepod").val();
        var sbPredmet = $("#sbPredmet").val();
        var sbGruppa = $("#sbGruppa").val();
        var sbPodgruppa = $("#sbPodgruppa").val();
        var sDay = $("#selectDay").val();
        var sPar = $("#selectPar").val();
        $.ajax({
                url:'/cfg2/addInDB.php',
                type:'GET',
                data:'prepod='+sbPrepod+'&predmet='+sbPredmet+'&gruppa='+sbGruppa+'&subgroup='+sbPodgruppa+'&day='+sDay+'&para='+sPar,
                success:function (data) {
                    $("#resultInfo").text(data);
                    
                }
        });       
    })
});