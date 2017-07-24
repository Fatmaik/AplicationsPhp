<table width="100%" style="margin-left:50px">
    <tr align="left">
        <th>Produtos</th>
        <th>Quantidade</th>
        <th>Valor Unitario</th>
        <th>Valor Total</th>
    </tr>  
    <tr>
        <?php foreach($item as $itens):?>
        <td>
            <img src="<?php  echo "/" .  $itens["local_armazem"] . $itens["nome"] . ".jpg";?>" alt="" border="0" width="60">
            <p><?php echo strtoupper($itens["nome"]) . "<br>" . $itens["marca"];?></p>
        </td>
        <td width="200">
            <div id="qt"style="color:#6B8E23">
                <img id="img1" src="/Assets/css/EstiloLV/img/menos.png" alt="" width="30px">
                <span id="qts">200</span>
                <img id="img2" src="/Assets/css/EstiloLV/img/mais.png" alt="" width="32">
            </div>
        </td>

        <td style="color:red;font-size:30px;">R$ <?php echo $itens["valor"];?></td>
        <td>4</td>
        <?php endforeach;?>
    </tr>

</table>