<?php

require "ENVIRONMENT.php";
// constante que esta no arquivo environment.php
global $config;
$config = array();

// se estiver sendo atualizado em casa
if(ENVIRONMENT == "DEVELOPMENT_HOME") {
    $config['host']   = "localhost";
    $config['dbname'] = "cfcamboriu";
    $config['dbuser'] = "root";
    $config['dbpass'] = "rancid";
}elseif(ENVIRONMENT == "DEVELOPMENT_WORK"){ // se estiver sendo atualizado no trabalho
    $config['host']   = "localhost";
    $config['dbname'] = "cfcamboriu";
    $config['dbuser'] = "root";
    $config['dbpass'] = "";
}elseif(ENVIRONMENT == "PRODUTION") { // configuracao para ambiente de produção
    $config['host']   = "localhost";
    $config['dbname'] = "cfcamboriu";
    $config['dbuser'] = "root";
    $config['dbpass'] = "";
}

