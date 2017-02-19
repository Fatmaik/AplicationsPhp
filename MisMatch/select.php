<?php
require_once 'conexao.php';

$select = $pdo->query("SELECT * from mismatch_user");
foreach($select->fetchAll() as $info) {
    $selEmail = $info['email'];
}

?>