<?php
class Controller {

    public function loadView($viewName, $viewData = array() ) {
    	global $config;
        extract($viewData);
        require_once "App/views/".$viewName.".php";
    }

    public function loadTemplate($viewName, $viewData = array()){
        global $config;
        require_once "App/views/Template.php";
    }
}
