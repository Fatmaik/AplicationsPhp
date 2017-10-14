<?php foreach($iten as $info): ?>
    <a href="/descricao/<?php echo $info['tabela'] ."/". $info['id'];?>">
        <p class='prod'>
        <img class=img src=<?php echo "../" . $info["local_armazem"] . $info["nome"] . ".jpg";?> alt='Medicamento'><br>
        <span><?php echo $info['nome'] . "<br><br>" . $info['descricao_prod'];?></span><br>
        <span1>R$<?php echo $info['valor']?><br></span1><br>
        <img class='carrinho' src='../Assets/css/EstiloLV/img/carrinho.png' alt='carrinho de compras'><br></p>
    </a>
<?php endforeach; ?>
