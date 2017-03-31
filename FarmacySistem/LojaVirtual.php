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
    <header>
        <div class="pedidos">Meus Pedidos</div>
        <div class="cadastro">Meu Cadastro</div>
    </header>
    <section>
        <img class="logo" src="css/EstiloLV/loja.png" alt="logo">
        <div class="campoBusca">
            <form action="$_GET" method="LV.php">    
                <input class="procura" type="text" placeholder="O que você procura?">    
                <input class="submit" type="image" src="css/EstiloLV/lupa.png" value="submit">              
            </form>
        </div>
    </section>
</body>
</html>