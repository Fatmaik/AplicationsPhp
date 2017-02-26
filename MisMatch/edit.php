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
    $nome = addslashes($_POST['nome'])?$_POST['nome']:$_SESSION['nome'];
    $sobrenome = addslashes($_POST['sobrenome'])?$_POST['sobrenome']:$_SESSION['sobrenome'];
    $cidade = addslashes($_POST['cidade'])?$_POST['cidade']:$_SESSION['cidade'];
    $estado = addslashes($_POST['estado'])?$_POST['estado']:$_SESSION['estado'];
    $email = addslashes($_POST['email'])?$_POST['email']:$_SESSION['email'];

    // caso haja alteracao nos dados o $_SESSION ira adquirir os novos valores 
    // e substituir os valores antigos;
    $_SESSION['nome'] = $nome;
    $_SESSION['sobrenome'] = $sobrenome;
    $_SESSION['cidade'] = $cidade;
    $_SESSION['estado'] = $estado;
    $_SESSION['email'] = $email;

    $image = $_FILES['imageEdit'];
    $imgname= $image['name'];

    $_SESSION['pic'] = $imgname;

    
    move_uploaded_file($image['tmp_name'], "imagesPerf/" . $imgname);
    
    if(!empty($imgname)) {
        echo "<div id='fotoPerfil2'><img id='fotoPerfilAll2' src='imagesPerf/".  $imgname . "'alt='foto de perfil'></div>";
    }else{
        echo "<div id='fotoPerfil'><img id='fotoPerfilAll1' src='css/fotoPerfil/perfilNull.jpg' alt='foto de perfil'></div>";
    }
    
    

    $pdo->query("UPDATE mismatch_user SET firstName = '$nome', lastName = '$sobrenome' ,
                        city = '$cidade', state = '$estado', email = '$email', picture = '$imgname' WHERE id = '$i' ");
    echo "<p class='p'>Alteração Concluida</p>";
}else{
    echo "<p class='p'>Alterou os dados com sucesso</p>";
    echo "<div id='fotoPerfil'><img id='fotoPerfilAll1' src='css/fotoPerfil/perfilNull.jpg' alt='foto de perfil'></div>";
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
            <div class="inpEdit">
                Nome <input type="text" name="nome" require placeholder= <?php echo  $_SESSION['nome'] ?> ><hr><br>
                Sobrenome <input type="text" name="sobrenome" require placeholder= <?php echo $_SESSION['sobrenome']?>><hr><br>
                Email <input type="email" name="email" require placaholder=<?php echo $_SESSION['email']?>><hr><br>
                Cidade <input type="text" name="cidade" require placeholder= <?php echo $_SESSION['cidade']?>><hr><br>
                Estado <input type="text" name="estado"require  placeholder= <?php echo $_SESSION['estado']?>><hr><br>
                
                <a class="button1" href="home.php">Retornar</a>
            </div>
            <label for="imageEdit">Select a avatar</label>
            <input type="file" name="imageEdit" id="imageEdit">
            <input class="button2" type="submit" name="submit" value="Salvar">
        </div>
    </form>
</body>
</html>