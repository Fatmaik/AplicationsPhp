<?php
// classe de conexao ao banco de dados farmacia
class Connect{
    public $dbase;
    
    public function __construct(){
        global $config;
        $host   = $config['host'];
        $dbname = $config['dbname'];
        $dbuser = $config['dbuser'];
        $dbpass = $config['dbpass'];

        $dsn = "mysql:dbname=".$dbname.";host=".$host;
        $this->dbase = new \PDO("mysql:dbname=farmacia;host=localhost", "root", "rancid");
        try{
            // return $this->db = new \PDO($dsn, $dbuser, $dbpass);
            
        }catch(PDOException $e) {
            echo "falha: " .$e->getMessage();
        }
    }
    public function testCon(){
        // $this->dbase = "test";
        // echo $this->dbase;
    }
 }