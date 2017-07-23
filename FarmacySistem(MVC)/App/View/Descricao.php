<div id="fotoProd">
    <?php foreach ($iten as $itens):?>
    <img src="<?php  echo "/" .  $itens["local_armazem"] . $itens["nome"] . ".jpg";?>" alt="" border="0">
</div>

<div id="info">
    <h2><?php echo strtoupper($itens['nome']);?></h2>
    <p><?php echo $itens['descricao_prod'];?></p>
    <h1>R$ <span id="preco"><?php echo $itens['valor'];?>,00</span></h1>
    
    <div id="divQuantidade">
        <img id="menos" src="/Assets/css/EstiloLV/img/menos.png" alt="" width="30px">
        <p id="quantidade">1 <br><span1 id="und">UND</span1></p>
        <img id="mais" src="/Assets/css/EstiloLV/img/mais.png" alt="" width="32">
        
        <div id="divCarrinho">
            <a href="/carrinho"></a><img src="/Assets/css/EstiloLV/img/carrinho.png" alt="carrinho de compras" width="50px">
            <p>COMPRAR</p>
        </div>
    </div>
    <?php endforeach;?>
</div>
<div style="clear:both"></div>