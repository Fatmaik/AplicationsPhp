<?php

class medicamentosController extends Controller{
    private $produtos;

    public function __construct() {
        $this->produtos = new Produtos();
    }

    public function index() {
        $dados["iten"] = $this->produtos->Select("medicamentos");
        $this->loadTemplate("medicamentos", $dados);  
    }

    public function Alergia() {
        $test = $this->produtos->carrinho_add();
        echo $test;
        $dados["iten"] = $this->produtos->filtro("medicamentos", $this->produtos->getUrl());
        $this->loadTemplate("medicamentos/". $this->produtos->getUrl(), $dados);
    }

    public function Inflamacao() {
        $dados["iten"] = $this->produtos->filtro("medicamentos", $this->produtos->getUrl());
        $this->loadTemplate("medicamentos/". $this->produtos->getUrl(), $dados);   
    }

    public function Resfriados() {
        $dados["iten"] = $this->produtos->filtro("medicamentos", $this->produtos->getUrl());
        $this->loadTemplate("medicamentos/". $this->produtos->getUrl(), $dados);   
    }

    public function Diabete() {
        $dados["iten"] = $this->produtos->filtro("medicamentos", $this->produtos->getUrl());
        $this->loadTemplate("medicamentos/". $this->produtos->getUrl(), $dados);    
    }

    public function Anestesico() {
        $dados["iten"] = $this->produtos->filtro("medicamentos", $this->produtos->getUrl());
        $this->loadTemplate("medicamentos/". $this->produtos->getUrl(), $dados);   
    }
    public function Dor() {
        $dados["iten"] = $this->produtos->filtro("medicamentos", $this->produtos->getUrl());
        $this->loadTemplate("medicamentos/". $this->produtos->getUrl(), $dados);    
    }
    public function Emagrecimento() {
        $dados["iten"] = $this->produtos->filtro("medicamentos", $this->produtos->getUrl());
        $this->loadTemplate("medicamentos/". $this->produtos->getUrl(), $dados);   
    }
    public function Gripes() {
        $dados["iten"] = $this->produtos->filtro("medicamentos", $this->produtos->getUrl());
        $this->loadTemplate("medicamentos/". $this->produtos->getUrl(), $dados);    
    }
    public function Febre() {
        $dados["iten"] = $this->produtos->filtro("medicamentos", $this->produtos->getUrl());
        $this->loadTemplate("medicamentos/". $this->produtos->getUrl(), $dados);    
    }
 
}