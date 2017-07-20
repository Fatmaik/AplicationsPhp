<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LojaVirtual</title>
    <link rel="stylesheet" href="/Assets/css/EstiloLV/estilo.css">
    <script src="/Assets/js/library/jquery.js"></script>
    <script src="/Assets/js/jsLV.js"></script>
</head>
<body>
    <?php
    $this->loadView("header");
    $item = new Produtos();

    // alteracao de titulo de itens pesquisados
    if(is_numeric($item->getUrl() ) ) {
        $prod = "Descrições Gerais";
    }else{
        $prod = $item->getUrl();
    }
    ?>
    
    <main class="main">
        <div class="prodAll">
            <p class="info"><?php echo ucfirst($prod);?> <hr></p>
            <?php $this->loadView($viewName, $viewData);?>            
        </div>
        <img id="cartoes" src="/Assets/css/EstiloLV/img/cartoes.png" alt="cartoes">   
    </main>
    
    <footer>
        <p>Desenvolvido por Dionathan (Site de Estudo)</p>
    </footer>
</body>
</html>