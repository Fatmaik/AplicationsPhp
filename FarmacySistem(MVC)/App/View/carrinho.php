<table width="100%" style="margin-left:50px">
    <tr align="left">
        <th>Imagem</th>
        <th>Produto</th>
        <th>Valor</th>
        <th>Ação</th>
    </tr>  
    <tr>
        <?php foreach($item as $itens):?>
        <td><img src="<?php  echo "/" .  $itens["local_armazem"] . $itens["nome"] . ".jpg";?>" alt="" border="0" width="60"></td>
        <td><?php echo strtoupper($itens["nome"]);?></td>
        <td>R$ <?php echo $itens["valor"];?></td>
        <td>4</td>
        <?php endforeach;?>
    </tr>

</table>