<?php

class Connect{
    // variavel que retornara a conexao com o banco de dados
    protected $dbase;

    public function __construct() {
        global $config;

        $host   = $config["host"];
        $dbname = $config["dbname"];
        $dbuser = $config["dbuser"];
        $dbpass = $config["dbpass"];

        $dsn = "mysql:dbname=".$dbname.";host=".$host;
        $this->dbase = new \PDO($dsn, $dbuser, $dbpass);  
    }
}