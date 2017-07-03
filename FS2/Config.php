<?php

define("ambiente", "teste");

global $config;

$config = array();

if(ambiente == "teste") {
    $config["dbname"] = "farmacia";
    $config["host"]   = "localhost";
    $comfig["dbuser"] = "root";
    $config["dbpass"] = "rancid";
}