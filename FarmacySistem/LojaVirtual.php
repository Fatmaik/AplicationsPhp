<?php require_once 'classProd.php';
$test = new Conexao("mysql:dbname=farmacia;host=localhost", "root", "rancid");
$test1 =new Produtos($test);

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
            <p class="info">Os Mais Baratos<hr></p>
            <?php echo $test1->info("medicamentos");?>            
        </div>
    </main>
    
</body>
</html>