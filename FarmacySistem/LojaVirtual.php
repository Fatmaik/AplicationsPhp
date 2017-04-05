<?php require_once 'classProd.php';
$conexao = new Conexao("mysql:dbname=farmacia;host=localhost", "root", "rancid");
$produtos= new Produtos($conexao);

?>
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
    <?php require_once 'header.php';?>
    
    <main class="main">
        <div class="prodAll">
            <p class="info">Todos os Produtos<hr></p>
            <?php 
            echo $produtos->info("medicamentos");
            echo $produtos->info("saude");
            echo $produtos->info("beleza");
            ?>            
        </div>

        
    </main>
    
</body>
</html>