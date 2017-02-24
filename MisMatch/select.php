<?php

require_once 'conexao.php';
$ID = $_SESSION['id'];

$select = $pdo->query("SELECT * from mismatch_user where id = '$ID' ");
foreach($select->fetchAll() as $info) {
$selEmail = $info['email'];
$selSenha = $info['senha'];

}

?>