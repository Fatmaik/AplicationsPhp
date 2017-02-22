<?php
session_start();
if($_SESSION['logado'] != TRUE) {
    header('Location: index.php');
}
require_once 'conexao.php';

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
    echo "<button class='button1' type='button' >Edit Profile</button>";
    echo "<button class='button2' type='button' >Exit</button><br><hr><br>";
    echo "<h1 id='h1'>People you might want to meet.</h1>";
    
    echo "<div class='pessoas'>";
    $sel = $pdo->query("SELECT * FROM mismatch_user");
    foreach($sel->fetchAll() as $info) {
        $id = $info['id'];
        
        // echo "div class='fotoPerfilTodos'><img src='css/fotoPerfilTodos' alt='foto'></div>";
        echo "<div id='boxTodos'>";
        echo "<p>Nome: " . $info['firstName']. " " . $info['lastName'] . "</p>";
       
        // recebe o calculo da idade de todos do db
        $ida = $pdo->query("SELECT (YEAR(CURDATE())-YEAR(birthdate)) - (RIGHT(CURDATE(),5)<RIGHT(birthdate,5)) as idade FROM mismatch_user WHERE id='$id' ");
        foreach($ida->fetchAll() as $idade) {
            $i = $idade['idade'];
            echo "<p>Idade: " . $i . " Anos</p>";
        }
        echo "<p>Cidade: " . $info['city'] . "</p>";
        echo "<p>Estado: " . $info['state'] . "</p>";
        echo "<p>Email: " . $info['email'] . "</p><br><br>";
        
        //////////////// acrecentar imagens nos perfis
        echo "</div>";
    }
    echo "</div>";

    echo "</div>";
    
    ?>
    
</body>
</html>