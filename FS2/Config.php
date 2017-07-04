<?php

define("AMBIENTE", "teste");

global $config;

$config = array();

if(AMBIENTE == "teste") {
    $config["dbname"] = "farmacia";
    $config["host"]   = "localhost";
    $config["dbuser"] = "root";
    $config["dbpass"] = "rancid";
}