<?php

class Produtos extends Connect{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function Select($tbname) {
        $array = array();
        $query = $this->dbase->query("SELECT * FROM $tbname ORDER BY RAND() ");
        $array = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }

    // metodo acha o item especifico que foi escolhido no menu de produtos
    public function filtro($tbname, $genero) {
        $array = array();
        $query = $this->dbase->query("SELECT * FROM $tbname WHERE genero = '$genero' " );
        $array = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }

    // metodo para capturar o conteudo do action e armazenar o item como tirulo de pesquisa na box de pesquisa
    public function getUrl() {
        $url = explode("index.php/", $_SERVER["PHP_SELF"]);
        $url = str_replace("/index.php", "Todos os Produtos", $url);
        $url = str_replace("medicamentos/", "", $url);
        $url = str_replace("saude/", "", $url);
        $url = str_replace("beleza/", "", $url);
        $url = str_replace("descricao/", "", $url);
        $url = str_replace("carrinho/", "MEU CARRINHO", $url);
       
        $url = end($url);
        // helper para retirar o numero do id ou "/" que sera setado no titulo da box acessada
        while(is_numeric($url[-1]) || $url[-1] ==  "/") {
            $url = str_replace($url[-1], " " , $url);
        }

        // se Titulo setado para a box de visualizavao do produto
        if($url == "" || $url == " ") {
            $url = "Descrições Gerais";
        }

        return $url;  
    }

    // funcoa utilizada para redirecionar o produto selecionado para a area de descrição e logo apos, para o carrinho
    public function ver($tabela, $id) {
        $query = $this->dbase->query("SELECT * FROM $tabela WHERE id = '$id' ");
        $array = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }

   
}