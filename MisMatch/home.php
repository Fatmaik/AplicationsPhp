<?php
session_start();
// caso nao houver ninguem logado e alguem tentar acessar esta pagina 
// pela url o mesmo e direcinado para o index
if($_SESSION['email'] == "null" && $_SESSION['logado'] != TRUE) {
    header('Location: index.php');
}
require_once 'conexao.php';
require_once 'headerMaster.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
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
    <div id='boxHome'>
        <div id='boximagemPerfil'>
            <?php
            
            if(isset($_SESSION['pic']) && !empty($_SESSION['pic'])) {
                echo "<img id='fotoPerfil' src='imagesPerf/".  $_SESSION['pic'] . "'alt='foto de perfil'>";
            
            }else{
                echo "<img id='fotoPerfil' src='css/fotoPerfil/perfilNull.jpg' alt='foto de perfil'>";
            }
            ?>
        </div>
        
        <div class='infoPessoal'>
            <p id='nomeCompleto'><?php echo $_SESSION['nome'] . " " . $_SESSION['sobrenome'] ?></p>
            <p>Idade: <?php echo $_SESSION['idade'] ?> Anos</p>
            <p>Cidade: <?php echo $_SESSION['cidade'] ?> </p>
            <p>Estado: <?php echo $_SESSION['estado'] ?> </p>
            <p>Email: <?php echo $_SESSION['email'] ?> </p>
            
        </div><br>
            
        <a class="button1" href="edit.php">Edit Profile</a>
        <a class="button2" href="index.php">Exit </a><br><br><br><hr>
    
        <h1 id='h1'>People you might want to meet.</h1><br>
    
        <div class='pessoas'>
            <?php
            $sel = $pdo->query("SELECT * FROM mismatch_user");
            foreach($sel->fetchAll() as $info) {
                $id = $info['id'];
                
                // nome da imagem para armazenar na tag img
                $img = $info['picture'];
                if(($img) == NULL) {
                    echo "<img id='fotoPerfilAll1' src='css/fotoPerfil/perfilNull.jpg' alt='foto de perfil'>";
                }else{
                    // echo "<img id='fotoPerfilAll2' src='imagesPerf/".  $img . "'alt='foto de perfil'>";
                    echo "<img id='fotoPerfilAll2' src='imagesPerf/".  $img . "'alt='foto de perfil'>";
                }
            ?>
          
        <div id='boxTodos'>
            <p>Nome: <?php echo $info['firstName'] . " " . $info['lastName'] ?></p>
       
            <?php
            // recebe o calculo da idade de todos do db
            $ida = $pdo->query("SELECT (YEAR(CURDATE())-YEAR(birthdate)) - (RIGHT(CURDATE(),5)<RIGHT(birthdate,5)) as idade FROM mismatch_user WHERE id='$id' ");
            foreach($ida->fetchAll() as $idade) {
                $i = $idade['idade'];
                echo "<p>Idade: " . $i . " Anos</p>";
            }
            ?>
            <p>Cidade: <?php echo $info['city'] ?> </p>
            <p>Estado: <?php echo $info['state'] ?></p>
            <p>Email: <?php echo $info['email'] ?></p><br><br>
        </div>
        <?php
        }
        ?>
    </div>

    </div>
</body>
</html>