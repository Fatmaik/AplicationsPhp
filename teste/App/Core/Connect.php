<?php
// classe de conexao ao banco de dados farmacia
class Connect{
    private $db;
    
    public function __construct(){
        global $config;
        $host   = $config['host'];
        $dbname = $config['dbname'];
        $dbuser = $config['dbuser'];
        $dbpass = $config['dbpass'];

        $dsn = "mysql:dbname".$dbname.";host=".$host;

        try{
            return $this->db = new \PDO($dsn, $dbuser, $dbpass);
        }catch(PDOException $e) {
            echo "falha: " .$e->getMessage();
        }
    }  
}