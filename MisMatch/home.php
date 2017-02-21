<?php
session_start();
if($_SESSION['logado'] != TRUE) {
    header('Location: index.php');
}
require_once 'select.php';
require_once 'headerMaster.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="css/home.css">
    <script src="js/javascript.js"></script>
</head>
<body>
    <div id="config">
        <ul id="editar">
            <li id="editProfile">Edit profile</li>
            <li id="sair">Exit</li>
        </ul>
    </div>
    
    
    <h1>Logado</h1>
    <?php
    

    
    echo $_SESSION['nome'];
    
    ?>
</body>
</html>