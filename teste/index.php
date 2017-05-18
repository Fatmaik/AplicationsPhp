<?php
require_once 'Config.php';
spl_autoload_register(function ($className) {
    if(file_exists("App/Controller/".$className.".php")) {
        require_once "App/Controller/".$className.".php";
    }
    if(file_exists("App/Model/".$className.".php")) {
        require_once "App/Model/".$className.".php";
    }
    if(file_exists("App/Core/".$className.".php")) {
        require_once "App/Core/".$className.".php";
    }
    
});

$c = new Core();
$c->run();
?>

<!--<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FarmacySistem</title>
    <link rel="stylesheet" href="css/EstiloIndex/estilo.css">
    <script src="js/jquery.js"></script>
    <script src="js/jsIndex.js"></script>
</head>
<body>
    <header>ESCOLHA A OPÇÂO DE ACESSO:</header>

    <article>
        <a class="Site" href=""><img src="css/EstiloIndex/farmacia.png" alt="Site"></a>
        <a class="LV" href=""><img src="css/EstiloIndex/loja.png" alt="loja"></a>
    </article>

</body>
</html>-->