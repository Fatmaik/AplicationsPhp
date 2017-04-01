<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LojaVirtual</title>
    <link rel="stylesheet" href="css/estiloLV/estilo.css">
    <script src="js/JsLV/jquery.js"></script>
    <script src="js/JsLV/javascript.js"></script>
</head>
<body>
    <header class="cadPed">
        <div class="pedidos">Meus Pedidos</div>
        <div class="cadastro">Meu Cadastro</div>
    </header>
    
    <section>
        <img class="logo" src="css/EstiloLV/img/loja.png" alt="logo">
        
        <form action="$_GET" method="LV.php" class="campoBusca">    
            <input class="procura" type="text" placeholder="O que você procura?">    
            <input class="submit" type="image" src="css/EstiloLV/img/lupa.png" value="submit">              
        </form>       
        
        <ul>   
            <li class="imgMed"><img src="css/EstiloLV/img/medicamentos.png" alt=""width="35px"></li>
            <li id="medic">Medicamentos</li>   
            <li class="imgSau"><img src="css/EstiloLV/img/saude.png" alt="" width="53px"></li>
            <li id="saude">Saude</li>
            <li class="imgBel"><img src="css/EstiloLV/img/escova.png" alt="" width="37px"></li>
            <li id="beleza">Beleza</li>
        </ul>  
    </section>
    <article class="article">
        .
            <div id="boxArticle">
                <img src="css/EstiloLV/img/tituloMedic.png" alt="">
                <hr>
                <p>Alergia</p>
                <p>Diabete</p>
                <p>Emagrecimento</p>
                <p>Inflamação</p>
                <p>Anestésico</p>
                <p>Gripes</p>
                <p>Resfriados</p>
                <p>Dor</p>
                <p>Febre</p>
                
                


            </div>
            <div id="hr"></div>
        </div>
    </article>
</body>
</html>