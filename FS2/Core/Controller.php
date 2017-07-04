<?php
class Controller {

    public function loadView($viewName, $viewData = array() ) {
    	global $config;
        extract($viewData);
        require_once "Views/".$viewName.".php";
    }

    public function loadTemplate($viewName, $viewData = array()){
        global $config;
        require_once "Views/Template.php";
    }
}