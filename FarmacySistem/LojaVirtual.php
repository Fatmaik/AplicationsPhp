<?php require_once 'classProd.php';
$test = new Conexao("mysql:dbname=farmacia;host=localhost", "root", "rancid");
$test1 =new Produtos($test);
$x = $test1->Select("medicamentos");


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
            <p class="info">Os Mais Baratos<hr>
            <?php foreach($x as $info) {?>
            <p class="prod">
                <img src=<?php echo $info["local_armazem"] . $info["nome"] . ".jpg";?> width="100px" alt=""><br>
                <span><?php echo $info["nome"] . "<br><br>" . $info["descricao_prod"];?></span><br>
                <span1>R$<?php echo $info["valor"] . ",00<br>";}?> </span1>
            </p>
            <!--<p class="prod"><img src="css/EstiloLV/img/beleza/cabelo/escova.png" width="68px" alt=""><br><span>Claritin</span><br><span1>R$ 45,00</span1>
            <p class="prod"><img src="css/EstiloLV/img/medicamentos/alergia/" alt=""><br><span>Claritin</span><br><span1>R$ 45,00</span1>
            <p class="prod"><img src="css/EstiloLV/img/medicamentos/alergia/" alt=""><br><span>Claritin</span><br><span1>R$ 45,00</span1>
            <p class="prod"><img src="css/EstiloLV/img/medicamentos/alergia/" alt=""><br><span>Claritin</span><br><span1>R$ 45,00</span1>
            <p class="prod"><img src="css/EstiloLV/img/medicamentos/alergia/" alt=""><br><span>Claritin</span><br><span1>R$ 45,00</span1>
            <p class="prod"><img src="css/EstiloLV/img/medicamentos/alergia/" alt=""><br><span>Claritin</span><br><span1>R$ 45,00</span1>
            <p class="prod"><img src="css/EstiloLV/img/medicamentos/alergia/" alt=""><br><span>Claritin</span><br><span1>R$ 45,00</span1>
            <p class="prod"><img src="css/EstiloLV/img/medicamentos/alergia/" alt=""><br><span>Claritin</span><br><span1>R$ 45,00</span1>
            <p class="prod"><img src="css/EstiloLV/img/medicamentos/alergia/" alt=""><br><span>Claritin</span><br><span1>R$ 45,00</span1>-->

        </div>
        




    </main>
    
</body>
</html>