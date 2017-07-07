<?php

/*
|--------------------------------------------------------------------------
| Autoload
|--------------------------------------------------------------------------
| Carregamento automatico de classes
*/

spl_autoload_register(function ($className) {

    global $config;

    if(file_exists("helpers/".$className.".php")) {
        require_once "helpers/".$className.".php";
    }

    if(file_exists("App/controller/".$className.".php")) {
        require_once "App/controller/".$className.".php";
    }
    if(file_exists("App/models/".$className.".php")) {
        require_once "App/models/".$className.".php";
    }
    if(file_exists("App/Core/".$className.".php")) {
        require_once "App/Core/".$className.".php";
    }
    
    
});

$c = new Core();
$c->run();

