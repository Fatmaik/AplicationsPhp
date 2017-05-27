$(document).ready(function() {
    home()
    hover();
    boxSetores();
    setor();
    

    Login()
})
function Login() {
    $("#Plogin").click(function() {
        $("#loginCadastro").css("display", "block");
    });
    $("#closePag").click(function() {
        $("#loginCadastro").css("display", "none");
    });
}


// funcao para redirecionamento de filtor de produtos retornando a url
function boxSetores() {
    $("#boxMedicamentos p").click(function() {
        var genero = $(this).text();
        var url = "medicamentos/" + genero;
        retiraAcentoDaUrl(url);
    })
    $("#boxSaude p").click(function() {
        var genero = $(this).text();
        var url = "saude/" + genero;
        retiraAcentoDaUrl(url);
    })
    $("#boxBeleza p").click(function() {
        var genero = $(this).text();
        var url = "beleza/" + genero;
        retiraAcentoDaUrl(url);
    })
}

// funcaopara retirar acentos das strings que seram passadas para a url
function retiraAcentoDaUrl(url) {
    // caracteres especiais para retirar e retonar uma string pura para a url
    strSChar = "áàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ ";
    strNoSChars = "aaaaaeeeeiiiiooooouuuucAAAAAEEEEIIIIOOOOOUUUUC ";
    
    var newUrl = "";
    for (var i = 0; i < url.length; i++) {
        if (strSChar.indexOf(url.charAt(i)) != -1) {
            newUrl += strNoSChars.substr(strSChar.search(url.substr(i, 1)), 1);
        } else {
            newUrl += url.substr(i, 1);
        }
    }
    newUrl.replace(/[^a-zA-Z 0-9]/g, '').toUpperCase();
    window.location.href = 'http://localhost:8080/'+ newUrl;
}


function hover() {
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
}

// funcao para direcionar para home quando clicar no icone do site
function home() {
    $(".logo").click(function() {
        window.location.href = "http://localhost:8080";
    })
}

// funcao para selecionar todos os produtos do setor selecionado
function setor() {
    $("#tituloMedic").click(function() {
        window.location.href = 'http://localhost:8080/Medicamentos';
    })
    $("#medic").click(function() {
        window.location.href = 'http://localhost:8080/Medicamentos';
    })
    $(".imgSau").click(function() {
        window.location.href = 'http://localhost:8080/Saude';
    })
    $("#saude").click(function() {
        window.location.href = 'http://localhost:8080/Saude';
    })
    $(".imgBel").click(function() {
        window.location.href = 'http://localhost:8080/Beleza';
    })
    $("#beleza").click(function() {
        window.location.href = 'http://localhost:8080/Beleza';
    })

}