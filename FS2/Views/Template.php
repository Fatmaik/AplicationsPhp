<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LojaVirtual</title>
    <link rel="stylesheet" href="../Assets/css/estiloLV/estilo.css">
    <script src="../Assets/js/jquery.js"></script>
    <script src="../Assets/js/jsLV.js"></script>
</head>
<body>
    <?php require_once 'header.php';?>
    
    <main class="main">
        <div class="prodAll">
            <p class="info">Todos os Produtos<hr></p>
            <?php 

            $this->loadView($viewName, $viewData);
            // $produtos = new classProd();
            // echo ;
            // echo $produtos->info("saude");
            // echo $produtos->info("beleza");
            echo $medicamentos;
            echo $beleza;
            echo $saude;
            ?>            
            
        </div>

        
        
    </main>
    
</body>
</html>