<?php
session_start();
require_once 'conexao.php';
// verifica se um form foi enviado
if(isset($_POST['submit'])) {
    // salva as 2 variavels informadas no form
    $user = (isset($_POST["login"]))?addslashes($_POST["login"]): "";
    $pass = (isset($_POST["senha"]))?md5(addslashes($_POST["senha"])): "";

    $sel = $pdo->query("SELECT * FROM usuarios");
    foreach($sel->fetchAll() as $info) {
        if ($info['login'] == $user AND $info['senha'] == $pass) {
            $_SESSION['logado'] = TRUE;
            header('Location: admin.php');
        }else{
            $_SESSION['logado'] = FALSE;
            
        }
    }
    echo "Nao Logou";
}
?>
<fieldset>
    <legend>Acess to Admin Area</legend>
    <h1>Area Designed only for Admin</h1><br>
    <form  method="post">
        <input type="text" name="login" required placeholder='User'><br>
        <input type="password" name="senha" required placeholder='Password'><br><br>
        <input type="submit" name="submit" value="Enter">
    </form>
</fieldset>