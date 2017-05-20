<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Header</title>
    <link rel="stylesheet" href="Assets/css/headerPhp/estilo.css">
    <script src="Assets/js/jquery.js"></script>
    <script src="Assets/js/jsIndex.js"></script>
</head>
<body>
    <header class="cadPed">
        <div class="pedidos">Meus Pedidos</div>
        <div class="cadastro">Meu Cadastro</div>
    </header>
    
    <section>
        <img class="logo" src="Assets/css/headerPhp/img/loja.png" alt="logo">
        
        <form action="$_GET" method="LV.php" class="campoBusca">    
            <input class="procura" type="text" placeholder="O que você procura?">    
            <input class="submit" type="image" src="Assets/css/headerPhp/img/lupa.png" value="submit">              
        </form>       
        
        <ul>   
            <li class="imgMed"><img src="Assets/css/headerPhp/img/medicamentos.png" alt=""width="35px"></li>
            <li id="medic">Medicamentos</li>   
            <li class="imgSau"><img src="Assets/css/headerPhp/img/saude.png" alt="" width="53px"></li>
            <li id="saude">Saude</li>
            <li class="imgBel"><img src="Assets/css/headerPhp/img/escova.png" alt="" width="37px"></li>
            <li id="beleza">Beleza</li>
        </ul>  
    </section>
    <article class="article">
        
            <div id="boxMedicamentos">
                <img src="Assets/css/headerPhp/img/tituloMedic.png" alt="">
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
            <div id="boxSaude">
                <img src="Assets/css/headerPhp/img/tituloSaude.png" alt="logosaude">
                <hr>
                <p>Dilatador Nasal</p>
                <p>Lentes</p>
                <p>Suplementos Alimenticios</p>
                <p>Preservativos</p>
                <p>Dentadura</p>
                <p>Protetor Solar</p>
            </div>
            <div id="boxBeleza">
                <img src="Assets/css/headerPhp/img/tituloBeleza.png" alt="logoBeleza">
                <hr>
                <p>Cabelo</p>
                <p>Maquiagem</p>
                <p>Maos</p>
                <p>Pés</p> 
                <p>Perfumes</p>
                <p>Tinturas</p>
            </div>
            <div id="hr"></div>    
        </div>
    </article>
    
</body>
</html>