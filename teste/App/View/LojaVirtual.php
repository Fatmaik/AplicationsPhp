<?php require_once "App/Model/Produtos.php";

// $conexao = new Conexao("mysql:dbname=farmacia;host=localhost", "root", "rancid");
// $produtos= new Produtos($conexao);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LojaVirtual</title>
    <link rel="stylesheet" href="Assets/css/EstiloLV/estilo.css">
    <script src="js/jquery.js"></script>
    <script src="Assets/js/jsLV.js"></script>
</head>
<body>
    <?php require_once 'header.php';?>
    
    <main class="main">
        <div class="prodAll">
            <p class="info">Todos os Produtos<hr></p>
            <?php 
            foreach($medicamentos as $info) {
            echo $html .=    "<p class='prod'>" .
                        "<img class=img src=" . $info['local_armazem'] . $info['nome'] . ".jpg alt='Medicamento'><br>" .
                        "<span>" . $info['nome'] . "<br><br>" . $info['descricao_prod'] . "</span><br>" .
                        "<span1>R$" . $info['valor'] . ",00<br></span1><br>" . 
                        "<img class='carrinho' src='css/EstiloLV/img/carrinho.png' alt='carrinho de compras'><br></p>";
        }
            ?>            
        </div>

        
        
    </main>
    
</body>
</html>