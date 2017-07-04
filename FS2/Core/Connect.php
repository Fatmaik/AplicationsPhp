<?php
// classe de conexao ao banco de dados farmacia
class Connect{
    
    public function __construct() {
        global $config;
        $host   = $config["host"];
        $dbname = $config["dbname"];
        $dbuser = $config["dbname"];
        $dbpass = $config["dbpass"];

        $dsn = "mysql:dbname=".$dbname."host=.".$host;

        try{
            return $pdo = new \PDO($dsn, $dbuser, $dbpass);
        }catch(PDOException $e) {
            echo "falha: " .$e->getMessage();
        }
        if($pdo) {
            echo "conectado";
        }else{
            echo " nao";
        }
    }
}