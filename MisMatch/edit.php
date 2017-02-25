<?php
// pagina de edicao de dados alteracao de nome, email etc...
session_start();
require_once 'conexao.php';
require_once 'headerMaster.php';
// caso nao houver ninguem logado e alguem tentar acessar esta pagina 
// pela url o mesmo e direcinado para o index
if($_SESSION['logado'] != TRUE) {
    header('Location: index.php');
};

// id cadastrado no banco de dados
$i = $_SESSION['id'];
if(isset($_POST["submit"])) {
    $nome = addslashes($_POST['nome']);
    $sobrenome = addslashes($_POST['sobrenome']);
    $cidade = addslashes($_POST['cidade']);
    $estado = addslashes($_POST['estado']);
    $email = addslashes($_POST['email']);

    $image = $_FILES['imageEdit'];
    $imgname= $image['name'];

    move_uploaded_file($image['tmp_name'], "imagesPerf/" . $imgname);
    

    $pdo->query("UPDATE mismatch_user SET firstName = '$nome', lastName = '$sobrenome' ,
                        city = '$cidade', state = '$estado', email = '$email' picture = '$imgname' WHERE id = '$i' ");
    echo "<p class='p'>Alteração Concluida</p>";
}else{
    echo "<p class='p'>Informe os dados que deseja alterar</p>";
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/edit.css">
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <div id="boxEdit">
            <div id="fotoPerfil">
                <?php
                
                $img = $_SESSION['pic'];
                
                if($_SESSION['pic']) {
                    echo "<img id='fotoPerfilAll2' src='imagesPerf/".  $img. "'alt='foto de perfil'>";
                }else{
                    echo "<img id='fotoPerfilAll1' src='css/fotoPerfil/perfilNull.jpg' alt='foto de perfil'>";
                    
                }

                // if(isset($_FILES['imageEdit'])) {
                //     echo "<img src='imagesPerf/'" . $imgname .  "alt='foto' id='notnull'>";
                //     echo "<label for='imageEdit'>Select a avatar</label>";
                //     echo "<input type='file' name='imageEdit' id='imageEdit'>";
                //     echo "sim";
                    
                // }else{
                    
                //     echo "<img src='imagesPerf/perfilNull.jpg' alt='foto' id='null'>";
                //     echo "<label for='imageEdit'>Select a avatar</label>";
                //     echo "<input type='file' name='imageEdit' id='imageEdit'>";
                //     echo "nao";

                // }
                ?>
                
        

            </div>

            <div class="inpEdit">
                Nome <input type="text" name="nome" require placeholder= <?php echo  $_SESSION['nome'] ?> ><hr><br>
                Sobrenome <input type="text" name="sobrenome" require placeholder= <?php echo $_SESSION['sobrenome']?>><hr><br>
                Email <input type="email" name="email" require placaholder=<?php echo $_SESSION['email']?>><hr><br>
                Cidade <input type="text" name="cidade" require placeholder= <?php echo $_SESSION['cidade']?>><hr><br>
                Estado <input type="text" name="estado"require  placeholder= <?php echo $_SESSION['estado']?>><hr><br>
                
                <a class="button1" href="home.php">Cancelar</a>
            </div>
            <input class="button2" type="submit" name="submit" value="Salvar">
        </div>
    </form>
</body>
</html>