<?php 
class Core{
    public function run() {
        
        // $url recebe a url acessada e apaga tudo que estiver antes do index.php na utl
        $url = explode("index.php", $_SERVER["PHP_SELF"]);
        // aparagar espaço em branco restando na index
        $url = end($url);
        //$params recebe o controller e action que forem setados na url ex: home/informacao/times
        $params = array();
        if(!empty($url)) {
            $url = explode("/", $url);
            
            $url = desenvolvimento::array_shift($url);
            
            // $currentController recebe a primeira string da url
            $currentController = ucwords(strtolower($url[0]))."Controller";  
            // apagando o valor do controller da url, para que restar depois disto seja 
            // a action ou parametros para acrescentar na $params
            $url = desenvolvimento::array_shift($url);
            if(isset($url[0])) {
                $currentAction = $url[0];
                
                // novamente retiramos a action da url,setar o $params, caso houver parametros na url
                desenvolvimento::array_shift($url);
            }else{
                $currentAction = "index";
            }
            if(count($url) > 0) {
                // tudo que restou na url retirando controller e action, passou para o params
                $params = $url;
            }
        }else{
            // obs essa classe HomeController .. pode ser alteraca para outro nome dentro do diretorio controller;
            $currentController = "HomeController";
            $currentAction     = "index";
        }
        global $config;
        require_once "App/Core/Controller.php";
        // chamando o controller atual
        $c = new $currentController();
        // chamando a action atual e parametros da url amigavel,caso exista algum
        call_user_func_array(array($c, $currentAction), $params);
    }
}