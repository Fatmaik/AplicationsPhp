<?php

class Controller {

    public function loadView($viewName, $viewData = array()) {
        extract($viewData);
        include "Views/".$viewName.".php";
    }

    public function loadTemplate($viewName, $viewData = array()) {
        include "Views/".$viewName.".php";
    }

}