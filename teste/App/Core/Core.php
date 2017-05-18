<?php

class Core{

    public function run() {
        // $url receve a url acessada depois do index,php
        $url = explode("index.php", $_SERVER["PHP_SELF"]);
        $url = end($url);

        // url amigaveis seram acrescentadas no $params
        $params = array();

        if(!empty($url)) {
            $url = explode("/", $url);
            array_shift($url);

            $currentController = $url[0];
            array_shift($url);

            if(isset($url[0])) {
                $currentAction = $url[0];
                array_shift($url);
            }else{
                $currrentAction = "index";
            }

            if(count($url) > 0) {
                $params = $url;
            }
        }else{
            $currentController = "Home";
            $currentAction     = "index";
        }  
        require_once "App/Core/Controller.php";

        $c = new $currentController;
        call_user_func_array(array($c, $currentAction), $params);
    }
}