
var btnAdd = document.querySelector('#btnAdd');
var retorno_adcional = document.querySelector('#retorno_adicional');
var cont = 0;
btnAdd.addEventListener('click', function() {
    var datas_retorno = [];
    cont ++;

    // ######### data de retorno adcional ###########
    if(cont <= 5) {
        // criacao de espacamento
        var br1 = document.createElement('br');
        var br2 = document.createElement('br');
        var br3 = document.createElement('br');
        retorno_adicional.appendChild(br1);
        retorno_adicional.appendChild(br2);
        retorno_adicional.appendChild(br3);
        // criacao de um label
        var data_retorno_label = document.createElement('label');
        // atributo do label
        data_retorno_label.setAttribute('for', 'data_retorno');
        // node do label
        var node_label = document.createTextNode('Data de Retorno');
        // acresentando o node no label
        data_retorno_label.appendChild(node_label);
        
        retorno_adicional.appendChild(data_retorno_label);

        var data_retorno_input = document.createElement('input');
        data_retorno_input.setAttribute('type', 'datetime-local');
        data_retorno_input.setAttribute('name', 'data_retorno'+cont);

        retorno_adicional.appendChild(br1);
        retorno_adicional.appendChild(br2);
        retorno_adicional.appendChild(data_retorno_input);
        retorno_adicional.appendChild(br2);

        
        
        // ######### data de retorno adcional ###########
        
        // criacao de espacamento
        var br1 = document.createElement('br');
        var br2 = document.createElement('br');
        var br3 = document.createElement('br');
        retorno_adicional.appendChild(br1);
        retorno_adicional.appendChild(br2);
        retorno_adicional.appendChild(br3);
        // criacao de um label
        var data_saida_label = document.createElement('label');
        // atributo do label
        data_saida_label.setAttribute('for', 'data_saida');
        // node do label
        var node_label = document.createTextNode('Data de Saída');
        // acresentando o node no label
        data_saida_label.appendChild(node_label);
        
        saida_adicional.appendChild(data_saida_label);
        
        var data_saida_input = document.createElement('input');
        data_saida_input.setAttribute('type', 'datetime-local');
        data_saida_input.setAttribute('name', 'data_saida'+cont);

        saida_adicional.appendChild(br1);
        saida_adicional.appendChild(br2);
        saida_adicional.appendChild(data_saida_input);
        saida_adicional.appendChild(br2);
        saida_adicional.appendChild(br3);
    }
    if(cont > 5) {
        document.querySelector('#msg').innerHTML = 'SOMENTE CINCO DATAS ADICIONAIS SÂO PERMITIDAS';
    }
    
})


$(document).ready(function () {

    function loading_show() {
        $('#loading').html("<img src='images/loading.gif'/>").fadeIn('fast');
    }

    function loading_hide() {
        $('#loading').fadeOut();
    }

    function loadData(page) {
        loading_show();
        $.ajax
            ({
                type: "POST",
                url: "load_data.php",
                data: "page=" + page,
                success: function (msg) {
                    $("#container").ajaxComplete(function (event, request, settings) {
                        loading_hide();
                        $("#container").html(msg);
                    });
                }
            });
    }
    loadData(1); // For first time page load default results
    $('#container .pagination li.active').live('click', function () {
        var page = $(this).attr('p');
        loadData(page);
    });
});

