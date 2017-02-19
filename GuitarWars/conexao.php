<?php
$dsn = 'mysql:dbname=guitarwars;host=localhost';
$dbuser = "root";
$dbpass = "********"; // your Password

try{
    $pdo = new PDO($dsn, $dbuser, $dbpass);
    // var to 
    $escape = mysqli_connect('localhost', $dbuser, $dbpass, 'guitarwars')or die("falha na conecao");
}catch(PDOExprecion $e) {
    echo "Falha: " . $e->getMessage();
}

?>