<img id="bandeira"src="<?php echo base_url('/assets/images/bandeira1.png')?>" alt="">

<div id="div_btns">
    <a href="inicio"><button id="bnt_cadastro">Voltar</button></a><br><br>
</div>

<p><?php echo $msg?></p>

<legend id="fieldset_cadastro">Cadastro de UFM para Agentes Políticos</legend>

<form action="" method="POST">

    <div id="inputs_left">

        <label for="servidor">Nome do Servidor</label><br>
        <input type="text" name="servidor" required><br><br>

        <label for="cidade_destino">Cidade de Destino</label><br>
        <input type="text" name="cidade_destino" required><br><br>

        <label for="distancia_destino">Distância do Destino</label><br>
        <input type="number" step='any' name="distancia_destino" required><br><br>

        <label for="valor_ufm">Registre o Valor da ufm</label><br>
        <input type="number" step='any' required name="valor_ufm"><br><br>

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

        <label for="data_saida">Data de Saída</label><br>
        <input type="datetime-local" name="data_saida" required ><br><br>

        <label for="data_retorno">Data de Retorno</label><br>
        <input type="datetime-local" name="data_retorno" required ><br><br>

    </div>

    <a href="/inicio"><button>Enviar</button></a><br><br>
</form>