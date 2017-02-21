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
    
</head>
<body>
    <div id="config">
        <ul id="editar">
            <li id="editProfile">Edit profile</li>
            <li id="sair">Exit</li>
        </ul>
    </div>
    
    <?php
    echo "<div id='boxHome'>";
    echo "<div id='boximagemPerfil'> <img id='fotoPerfil' src='css/fotoPerfil/perfilNull.jpg' alt='foto de perfil'>";
    echo "<p id='nomeCompleto'>". $_SESSION['nome'] . " " . $_SESSION['sobrenome'] . "</p>";
    echo "</div>";
    echo "<div class='infoPessoal'>";
    echo "<p>Idade: ". $_SESSION['idade']. " Anos</p>";
    echo "<p>Cidade: ". $_SESSION['cidade'] . "</p>";
    echo "<p>Estado: ". $_SESSION['estado'] . "</p>";
    echo "<p>Email: ". $_SESSION['email'] . "</p>";
    echo "</div>";
    echo "</div>";

    
    
    
    ?>
</body>
</html>