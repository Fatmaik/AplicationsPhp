<?php
// classe de conexao ao banco de dados farmacia
class Conexao{
    private $dsn;
    private $dbuser;
    private $dbpass;

    public function __construct($dsn, $dbuser, $dbpass){
        $this->dsn = $dsn;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
    }
    public function connect() {
        try{
            return $pdo = new \PDO($this->dsn, $this->dbuser, $this->dbpass);
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