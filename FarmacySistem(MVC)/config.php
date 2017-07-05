<?php
require "Environment.php";
global $config;
$config = array();

if(ENVIRONMENT == "development") {
    $config['host']   = "localhost";
    $config['dbname'] = "farmacia";
    $config['dbuser'] = "root";
    $config['dbpass'] = "rancid";
}