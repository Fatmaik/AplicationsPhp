<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/headerMaster.css">
    <script src="js/jquery.js"></script>
    <script src="js/javascript.js"></script>
</head>
<body>
    <header>
        <h5>Mismatch</h5>
        <div id="boxBusca">
            <input type="text" name="procurar" id="txtBusca" placeholder=" Buscar..."><br>
            <img src="css/busca2.png" alt="busca" id="busca">
        </div>
        
        <div id="headerUser">
            <p id="nome"> <?php echo $_SESSION['nome']?></p>
        </div>
      </header>
</body>
</html>