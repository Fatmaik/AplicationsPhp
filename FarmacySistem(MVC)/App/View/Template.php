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
    
    <div id="headTemplate">
        <img id="imgHead" src="/Assets/css/EstiloLv/img/promocaocarinho.png" alt="">
    </div>
    
    <main class="main">
        <div class="prodAll">
            <p class="info"><?php echo ucfirst($prod);?> <hr></p>
            <?php $this->loadView($viewName, $viewData);?>            
        </div>
        <p style="text-align:center">
            As informações contidas neste site não devem ser usadas para automedicação e não substituem, em hipótese <br>
            alguma, as orientações dadas pelo profissional da área médica. Somente o médico está apto a diagnosticar <br>
            qualquer problema de saúde e prescrever o tratamento adequado. Todos os pedidos efetuados estão sujeitos <br>
            à confirmação da disponibilidade de produto em nosso estoque. <br><br>

            OS PREÇOS APRESENTADOS NO SITE SÃO DIFERENTES DOS PREÇOS DAS LOJAS FÍSICAS. <br><br>

            FARMACIA ONLINE | Cia PRODUTOS ONLINE | CNPJ: 00.000.000/0000-00 | End: https://farmaciaonline.com.br, <br> 
            | Camboriu - SC | CEP: 00.000-000 |<br><br>

            Farmacêutico Responsável: Dr Fulano . Farmaceutico  CRF/SP: 00000 | IE: 000.000.000.000 | Fone:(47) 0000-0000| <br>
            e-mail: sac@farmonline.com.br <br><br>

            A Farmacia Online segue as determinações da Agência Nacional de Vigilância SanitáriaAnvisa (ANVISA)
        </p>
        <img id="cartoes" src="/Assets/css/EstiloLV/img/cartoes.png" alt="cartoes">   
    </main>
    
    <footer>
        <p>Desenvolvido por Dionathan (Site de Estudo)</p>
    </footer>
</body>
</html>