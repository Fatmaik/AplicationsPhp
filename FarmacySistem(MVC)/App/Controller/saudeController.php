<?php
class saudeController extends Controller{
    private $produtos;

    public function __construct() {
        $this->produtos = new Produtos();
    }

    public function index() {
        $dados["iten"] = $this->produtos->Select("saude");
        $this->loadTemplate("saude", $dados);
    }
    
    public function Dentadura(){
        $dados["iten"] = $this->produtos->filtro("saude", $this->produtos->getUrl());
        $this->loadTemplate("saude/". $this->produtos->getUrl(), $dados);   
    }

    public function Nasal(){
        $dados["iten"] = $this->produtos->filtro("saude", $this->produtos->getUrl());
        $this->loadTemplate("saude/". $this->produtos->getUrl(), $dados);
    }

    public function Lentes(){
        $dados["iten"] = $this->produtos->filtro("saude", $this->produtos->getUrl());
        $this->loadTemplate("saude/". $this->produtos->getUrl(), $dados); 
    }

    public function Preservativos(){
        $dados["iten"] = $this->produtos->filtro("saude", $this->produtos->getUrl());
        $this->loadTemplate("saude/". $this->produtos->getUrl(), $dados);;  
    }

    public function Protetor(){
        $dados["iten"] = $this->produtos->filtro("saude", $this->produtos->getUrl());
        $this->loadTemplate("saude/". $this->produtos->getUrl(), $dados);   
    }

    public function Suplementos(){
        $dados["iten"] = $this->produtos->filtro("saude", $this->produtos->getUrl());
        $this->loadTemplate("saude/". $this->produtos->getUrl(), $dados);  
    }
}