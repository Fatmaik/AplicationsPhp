<?php
// classe de conexao ao banco de dados farmacia
class Connect{
    protected $dbase;
    
    public function __construct(){
        global $config;
        $host   = $config['host'];
        $dbname = $config['dbname'];
        $dbuser = $config['dbuser'];
        $dbpass = $config['dbpass'];

        $dsn = "mysql:dbname=".$dbname.";host=".$host;
        try{
            return $this->dbase = new \PDO($dsn, $dbuser, $dbpass);  
        }catch(PDOException $e) {
            echo "falha: " .$e->getMessage();
        }
    }
    public function testCon(){
        $this->dbase = "test";
        echo $this->dbase;
    }
 }