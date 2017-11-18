<img id="bandeira"src="<?php echo base_url('/assets/images/bandeira1.png')?>" alt="">

<div id="div_btns">
    <a href="inicio"><button id="bnt_cadastro">Voltar</button></a><br><br>
</div>

<p id='msg'><?php echo $msg?></p>

<legend id="fieldset_cadastro">Cadastro de Diária </legend>

<form action="" method="POST">

    <div id="inputs_left">

        <label for="servidor">Nome do Servidor</label><br>
        <input type="text" name="servidor" required><br><br>

        <label for="cidade_destino">Cidade de Destino</label><br>
        <input type="text" name="cidade_destino" required><br><br>

        <label for="data_saida">Data de Saída</label><br>
        <input type="datetime-local" name="data_saida" required ><br><br>

        <div id='saida_adicional'>
        
        </div>

    </div>

    <div id="inputs_right">

        <label for="estado_destino">Destino</label><br>
        <select name="estado_destino" required>
            <option value="">Selecione o Estado</option>
            <option value="Acre - AC">Acre</option>
            <option value="Alagoas - AL">Alagoas</option>
            <option value="Amapá - AP">Amapá</option>
            <option value="Amazonas - AM">Amazonas</option>
            <option value="Bahia - BA">Bahia</option>
            <option value="Ceará - CE">Ceará</option>
            <option value="Distrito Federal - DF">Distrito Federal</option>
            <option value="Espírito Santo - ES">Espírito Santo</option>
            <option value="Goiás - GO">Goiás</option>
            <option value="Maranhão - MA">Maranhão</option>
            <option value="Mato Grosso - MT">Mato Grosso</option>
            <option value="Mato Grosso do Sul - MS">Mato Grosso do Sul</option>
            <option value="Minas Gerais - MG">Minas Gerais</option>
            <option value="Pará - PA">Pará</option>
            <option value="Paraíba - PB">Paraíba</option>
            <option value="Paraná - PR">Paraná</option>
            <option value="Pernambuco - PE">Pernambuco</option>
            <option value="Piauí - PI">Piauí</option>
            <option value="Rio de Janeiro - RJ">Rio de Janeiro</option>
            <option value="Rio Grande do Norte - RN">Rio Grande do Norte</option>
            <option value="Rio Grande do Sul - RS">Rio Grande do Sul</option>
            <option value="Rondônia - RO">Rondônia</option>
            <option value="Roraima - RR">Roraima</option>
            <option value="Santa Catarina - SC">Santa Catarina</option>
            <option value="São Paulo - SP">São Paulo</option>
            <option value="Sergipe - SE">Sergipe</option>
            <option value="Tocantins - TO">Tocantins</option>
            <option value="Exterior">Exterior</option>
        </select><br><br>

        <label for="distancia_destino">Distância do Destino em Kilometros</label><br>
        <input type="number" step='any' name="distancia_destino"  placeholder='ex:300'required><br><br>

        <label for="data_retorno">Data de Retorno</label><br>
        <input type="datetime-local" name="data_retorno" required>

        <img src="<?php echo base_url('/assets/images/ButtonAdd.png')?>" id='btnAdd' alt="">
        
        <div id='retorno_adicional'>
        </div><br>
    </div>
        <div>
            <legend>Links para auxilio no calculo de distância</legend><br>
            <a href="http://www.cidademapa.com.br/calcular-distancia.php" target='__blank'><button id='bt_links'>link 1</button></a>
            <a href="http://www.aondefica.com/mapgg032010.asp" target='__blank'><button id='bt_links'>link 2</button></a>
            <a href="https://www.mapeia.com.br/" target='__blank'><button id='bt_links'>link 3</button></a><br><br>
        </div><br><br>
    <br>
    <a href="#"><button>Enviar</button></a><br><br><br>
</form>


