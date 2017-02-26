<?php
require_once 'conexao.php';
// script ultilisado para verificacao de email na pagina de login
$select = $pdo->query("SELECT * from mismatch_user");
foreach($select->fetchAll() as $info) {
$selEmail = $info['email'];
$selSenha = $info['senha'];

}

?>