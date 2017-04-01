$(document).ready(function() {
    
    $("#medic").hover(function() {
        $("#boxMedicamentos").css("display", "block");
        $("#boxSaude").css("display", "none");
        $("#boxBeleza").css("display", "none");
    });
    $("#saude").hover(function() {
        $("#boxMedicamentos").css("display", "none");
        $("#boxSaude").css("display", "block");
        $("#boxBeleza").css("display", "none");
    })
    $("#beleza").hover(function() {
        $("#boxMedicamentos").css("display", "none");
        $("#boxSaude").css("display", "none");
        $("#boxBeleza").css("display", "block");
    })
    $(".main").mouseover(function() {
        $("#boxMedicamentos").css("display", "none");
        $("#boxSaude").css("display", "none");
        $("#boxBeleza").css("display", "none");
    });
    
   
     
})