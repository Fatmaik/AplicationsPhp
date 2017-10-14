<?php
require_once "constants.php";
// $config sera uma variavel que possue os valores dos parametros para a conexao com o DB;


global $config;

$config = array();
if(ENVIRONMENT == "dbDionathan") {
    $config["host"] = "localhost";
    $config["dbname"] = "db_gt";
    $config["dbuser"] = "root";
    $config["dbpass"] = "rancid";
}
 else if(ENVIRONMENT == "dbBruno") {
     $config["host"] = "localhost"; 
     $config["dbname"] = "db_gt";
     $config["dbuser"] = "root";
     $config["dbpass"] = "root";
}

$config['base_url']	= 'http://localhost:8080/';


require_once "autoload.php";