<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LojaVirtual</title>
    <link rel="stylesheet" href="Assets/css/EstiloLV/estilo.css">
    <script src="Assets/js/jquery.js"></script>
    <script src="Assets/js/jsLV.js"></script>
</head>
<body>
    <!--<img src="Assets/css/EstiloLV/img/medicamentos/resfriado/coristinaD.jpg" alt="">-->

    <?php foreach($medicamentos as $info): ?>
    <p class='prod'>
    <p><?php echo $info["local_armazem"] . $info["nome"] . ".jpg";?></p>
    <img class=img src=<?php echo $info["local_armazem"] . $info["nome"] . ".jpg";?>alt='Medicamento'><br>
    <span><?php echo $info['nome'] . "<br><br>" . $info['descricao_prod'];?></span><br>
    <span1>R$<?php echo $info['valor']?>,00<br></span1><br>
    <img class='carrinho' src='Assets/css/EstiloLV/img/carrinho.png' alt='carrinho de compras'><br></p>
        
    <?php endforeach; ?>
</body>
</html>



