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

$i = $_SESSION['id'];
echo $i;

if(isset($_POST["submit"])) {
    $nome = addslashes($_POST['nome']);
    $sobrenome = addslashes($_POST['sobrenome']);
    $cidade = addslashes($_POST['cidade']);
    $estado = addslashes($_POST['estado']);
    $email = addslashes($_POST['email']);

    $pdo->query("UPDATE mismatch_user SET firstName = '$nome', lastName = '$sobrenome' ,
                        city = '$cidade', state = '$estado', email = '$email' WHERE id = '$i' ");
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
    <form method="post">
        <div id="boxEdit">
            <div id="fotoPerfil">
                <img src="css/fotoPerfil/perfilNull.jpg" alt="foto">
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