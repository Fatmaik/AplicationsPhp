<?php
class belezaController extends Controller {
    private $produtos;

    public function __construct() {
        $this->produtos = new Produtos();
    }
    
    public function index() {
        $dados["iten"] = $this->produtos->Select("beleza");
        $this->loadTemplate("beleza", $dados); 
    }

    public function Cabelo() {
        $dados["iten"] = $this->produtos->filtro("beleza", $this->produtos->getUrl());
        $this->loadTemplate("beleza/". $this->produtos->getUrl(), $dados); 
    }

    public function Maos() {
        $dados["iten"] = $this->produtos->filtro("beleza", $this->produtos->getUrl());
        $this->loadTemplate("beleza/". $this->produtos->getUrl(), $dados); 
    }

    public function Maquiagem() {
        $dados["iten"] = $this->produtos->filtro("beleza", $this->produtos->getUrl());
        $this->loadTemplate("beleza/". $this->produtos->getUrl(), $dados);  
    }

    public function Perfumes() {
        $dados["iten"] = $this->produtos->filtro("beleza", $this->produtos->getUrl());
        $this->loadTemplate("beleza/". $this->produtos->getUrl(), $dados); 
    }

    public function Pes() {
        $dados["iten"] = $this->produtos->filtro("beleza", $this->produtos->getUrl());
        $this->loadTemplate("beleza/". $this->produtos->getUrl(), $dados); 
    }

    public function Tinturas() {
        $dados["iten"] = $this->produtos->filtro("beleza", $this->produtos->getUrl());
        $this->loadTemplate("beleza/". $this->produtos->getUrl(), $dados); 
    }
}