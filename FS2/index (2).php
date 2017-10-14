<?php
require_once "Config.php";

spl_autoload_register(function ($className) {
    if(file_exists("Controllers/".$className.".php")) {
        require_once "Controllers/".$className.".php";
    }
    if(file_exists("Models/".$className.".php")) {
        require_once "Models/".$className.".php";
    }
    if(file_exists("Core/".$className.".php")) {
        require_once "Core/".$className.".php";
    }
});

$cont = new Core();
$cont->run();

