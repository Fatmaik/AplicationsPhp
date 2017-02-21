$(document).ready(function() {
    
    $("#btnEdit").on("click", function() {
        $("#config").css("visibility", "visible");
    });
    
    $("#config").on({
        mouseover: function() {
            $(this).css("visibility", "visible");
        },
        mouseout: function() {
            $(this).css("visibility", "hidden");
        }
    });
        
    


})