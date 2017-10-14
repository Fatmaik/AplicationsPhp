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

    public function carrinho_add() {

        // foreach($dados as $iten) {
            // $cliente_id = $iten["id"];
            // $nome = $inten["nome"];
            // $marca = $inten["marca"];
            // $descricao_prod = $inten["descricao_prod"];
            // $local_armazen = $iten["local_armazen"];
            // $quentidade = $iten["quantidade"];
            // $tabela = $iten["tabela"];

        //     $cliente_id = 20;
        //     $nome = "test";
        //     $marca = "test";
        //     $descricao_prod = "test";
        //     $local_armazen = "test";
        //     $quentidade = 20;
        //     $tabela = "test";

        // }
        // $query = $this->dbase->query("INSERT INTO carrinho VALUES(default, $cliente_id, $nome, $marca, $descricao_prod, $local_armazen, $quantidade, $tabela");
        $this->dbase->query("INSERT INTO carrinho VALUES(default, 1, 'nome', 'marca', 'descricao_prod', 'local_armazen', 2, 'TEST' ");
    }

   
}