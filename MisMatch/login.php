<?php
session_start();
require_once 'conexao.php';


if(isset($_POST["emailL"]) && $_POST["emailL"] != "null" && isset($_POST["senhaL"]) && $_POST["senhaL"] != "null" ) {
    $emailLogin = addslashes($_POST["emailL"]);
    $senhaLogin = md5(addslashes($_POST["senhaL"]));

    $sel = $pdo->query("SELECT * FROM mismatch_user WHERE email = '$emailLogin' AND senha = '$senhaLogin' ");
    foreach($sel->fetchAll() as $info) {
        $email = $info['email'];
        $senha = $info['senha'];
        $_SESSION['id'] = $info['id'];
        $_SESSION['nome'] = $info["firstName"];
        $_SESSION['sobrenome'] = $info['lastName'];
        $_SESSION['genero'] = $info['gender'];
        $_SESSION['cidade'] = $info['city'];
        $_SESSION['estado'] = $info['state'];
        $_SESSION['foto'] = $info['picture'];
        $_SESSION['email'] = $info['email'];
        
        if($email == $emailLogin && $senha == $senhaLogin) {
            $_SESSION['logado'] = TRUE;
            header('Location: home.php');
        }else{
            $_SESSION['logado'] = TRUE;
            echo "<p id='msgLogin1'>Informe Email e senha corretos</p>";
        }
    }
    // melhor forma que arrumei para armazenar a idade da pessoa na session 
    $ida = $pdo->query("SELECT (YEAR(CURDATE())-YEAR(birthdate)) - (RIGHT(CURDATE(),5)<RIGHT(birthdate,5)) as idade
        FROM mismatch_user WHERE email = '$emailLogin' AND senha = '$senhaLogin'");
    foreach($ida->fetchAll() as $idade) {
        $_SESSION['idade'] = $idade['idade'];
    }
}else{
    // valor em branco caso nao possua nenhuma conta logada , 
    // o valor nulo serve para a Session_destroy() acontecer sem haver erros na pagina de login
    // pois esta pagina recebe valor do id para comparar emails ja cadastrados
    $_SESSION['id'] = "";
}
?>
<link rel="stylesheet" href="css/login.css">
<header>
        <div id="header">
            <h1>Mismatch</h1>
            <form method="post">
                <label for="email">Email</label><label id="labelSenha" for="senha">Senha</label><br>
                <input type="email" name="emailL" id="emailL" required/>
                <input type="password" name="senhaL" id="senhaL" required>
                <input type="submit" name="submitL" id="submitL" value="Entrar" class="button">
            </form>
        </div>
</header>