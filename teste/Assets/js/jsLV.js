$(document).ready(function() {
    
    $(".logo").click(function() {
        window.location.href = "http://localhost:8080";
    })

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
     
     $("#boxMedicamentos p").click(function() {
        var url = $(this).text();
        
        // caracteres especiais para retirar e retonar uma string pura para a url
        strSChar = "áàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ";
        strNoSChars = "aaaaaeeeeiiiiooooouuuucAAAAAEEEEIIIIOOOOOUUUUC";
        
        var newUrl = "";
        for (var i = 0; i < url.length; i++) {
            if (strSChar.indexOf(url.charAt(i)) != -1) {
                newUrl += strNoSChars.substr(strSChar.search(url.substr(i, 1)), 1);
            } else {
                newUrl += url.substr(i, 1);
            }
        }
        newUrl.replace(/[^a-zA-Z 0-9]/g, '').toUpperCase();
        window.location.href = 'http://localhost:8080/medicamentos/'+ newUrl;
    })
})