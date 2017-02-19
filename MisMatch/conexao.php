<?php
$dsn = 'mysql:dbname=mismath;host=localhost';
$dbuser = "root";
$dbpass= "rancid";
try{
    $pdo = new PDO($dsn, $dbuser, $dbpass);
}catch(PDOException $e) {
    echo "Falha de Conexao: " . $e->getMessage();
}
?>