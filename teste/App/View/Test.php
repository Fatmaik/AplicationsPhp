<h1>test</h1>
<!--<?php foreach($medicamentos as $info):?>
    <p class='prod'>
    <img class=img src=<?php echo $info['local_armazem'] . $info['nome'];?> ".jpg" alt='Medicamento'><br>
    <span> <?php echo $info['nome']?> <br><br><?php echo  $info['descricao_prod'];?></span><br>
    <span1>R$ <?php echo $info['valor'];?>,00<br></span1><br> 
    <img class='carrinho' src='css/EstiloLV/img/carrinho.png' alt='carrinho de compras'><br></p>";
<?php endforeach; ?>-->

<?php


var_dump($resultMedicamentos=$medicamentos->fetchAll(PDO::FETCH_ASSOC));