<?php
class saudeController extends Controller{

    public function index() {
        $dados = array();
        $produtos = new Produtos();
        $dados["iten"] = $produtos->Select("saude");
        $this->loadTemplate("saude", $dados);
    }
    
    public function Dentadura(){
        $dados = array();
        $produtos = new Produtos();
        $iten = $produtos->getUrl();
        $dados["iten"] = $produtos->filtro("saude", $produtos->getUrl());
        $this->loadTemplate("saude/". $produtos->getUrl(), $dados);   
    }

    public function Nasal(){
        $dados = array();
        $produtos = new Produtos();
        $iten = $produtos->getUrl();
        $dados["iten"] = $produtos->filtro("saude", $produtos->getUrl());
        $this->loadTemplate("saude/". $produtos->getUrl(), $dados);  
    }

    public function Lentes(){
        $dados = array();
        $produtos = new Produtos();
        $iten = $produtos->getUrl();
        $dados["iten"] = $produtos->filtro("saude", $produtos->getUrl());
        $this->loadTemplate("saude/". $produtos->getUrl(), $dados); 
    }

    public function Preservativos(){
        $dados = array();
        $produtos = new Produtos();
        $iten = $produtos->getUrl();
        $dados["iten"] = $produtos->filtro("saude", $produtos->getUrl());
        $this->loadTemplate("saude/". $produtos->getUrl(), $dados);  
    }

    public function Protetor(){
        $dados = array();
        $produtos = new Produtos();
        $iten = $produtos->getUrl();
        $dados["iten"] = $produtos->filtro("saude", $produtos->getUrl());
        $this->loadTemplate("saude/". $produtos->getUrl(), $dados);   
    }
    

    public function Suplementos(){
        $dados = array();
        $produtos = new Produtos();
        $iten = $produtos->getUrl();
        $dados["iten"] = $produtos->filtro("saude", $produtos->getUrl());
        $this->loadTemplate("saude/". $produtos->getUrl(), $dados);  
    }
}