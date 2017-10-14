<?php
session_start();
// caso nao houver ninguem logado e alguem tentar acessar esta pagina 
// pela url o mesmo e direcinado para o index
if($_SESSION['logado'] != TRUE) {
    header('Location: index.php');
}
require_once 'conexao.php';
// header master e apenas um header para acrescntar em tds as paginas
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
            // se existir uma nova imagem ela sera colocada na area da imagem
            if(isset($_SESSION['pic']) && !empty($_SESSION['pic'])) {
                echo "<img id='fotoPerfil' src='imagesPerf/".  $_SESSION['pic'] . "'alt='foto de perfil'>";
            }else{
                // se nao existir uma nova imagem, sera usada a imagem padrao 
                echo "<img id='fotoPerfil' src='css/fotoPerfil/perfilNull.jpg' alt='foto de perfil'>";
            }
            ?>
        </div>
        <!-- informacoes do user sendo impressas na tela-->
        <div class='infoPessoal'>
            <p id='nomeCompleto'><?php echo $_SESSION['nome'] . " " . $_SESSION['sobrenome'] ?></p>
            <p>Idade: <?php echo $_SESSION['idade'] ?> Anos</p>
            <p>Cidade: <?php echo $_SESSION['cidade'] ?> </p>
            <p>Estado: <?php echo $_SESSION['estado'] ?> </p>
            <p>Email: <?php echo $_SESSION['email'] ?> </p>
        </div><br>
            
        <a class="button1" href="edit.php">Edit Profile</a>
        <a class="button2" href="sessionOut.php" >Exit </a><br><br><br><hr>
           
        <h1 id='h1'>People you might want to meet.</h1><br>
    
        <div class='pessoas'>
            <?php
            // busca todos os usuarios cadastrados no DB e imprimi na tela com imagem e dados
            $sel = $pdo->query("SELECT * FROM mismatch_user");
            foreach($sel->fetchAll() as $info) {
                $id = $info['id'];
                
                // nome da imagem para armazenar na tag img... Esta parte refere-se a imagens dos outros usuarios
                $img = $info['picture'];
                if(($img) == NULL) {
                    echo "<img id='fotoPerfilAll1' src='css/fotoPerfil/perfilNull.jpg' alt='foto de perfil'>";
                }else{
                    echo "<img id='fotoPerfilAll2' src='imagesPerf/".  $img . "'alt='foto de perfil'>";
                }
            ?>
            <!-- esta div contendo os dados dos user esta dentro do primeiro foreach -->
            <div id='boxTodos'>
                <p>Nome: <?php echo $info['firstName'] . " " . $info['lastName'] ?></p>
        
                <?php
                // recebe o calculo da idade de todos do db
                $ida = $pdo->query("SELECT (YEAR(CURDATE())-YEAR(birthdate)) - (RIGHT(CURDATE(),5)<RIGHT(birthdate,5)) as idade FROM mismatch_user WHERE id='$id' ");
                // foreach para o calculo de idades dos users
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