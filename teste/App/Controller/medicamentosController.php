<?php

class medicamentosController extends Controller{

    public function index() {
        $dados = array();
        $produtos = new Produtos();
        $dados["iten"] = $produtos->Select("medicamentos");
        $this->loadTemplate("medicamentos", $dados);
        
    }
    public function Alergia() {
        $dados = array();
        $produtos = new Produtos();
        $iten = $produtos->getUrl();
        $dados["iten"] = $produtos->filtro($produtos->getUrl());
        $this->loadTemplate("medicamentos/". $produtos->getUrl(), $dados);
    }

    public function Inflamacao() {
        $dados = array();
        $produtos = new Produtos();
        $iten = $produtos->getUrl();
        $dados["iten"] = $produtos->filtro($produtos->getUrl());
        $this->loadTemplate("medicamentos/". $produtos->getUrl(), $dados);    
    }

    public function Resfriados() {
        $dados = array();
        $produtos = new Produtos();
        $iten = $produtos->getUrl();
        $dados["iten"] = $produtos->filtro($produtos->getUrl());
        $this->loadTemplate("medicamentos/". $produtos->getUrl(), $dados);    
    }

    public function Diabete() {
        $dados = array();
        $produtos = new Produtos();
        $iten = $produtos->getUrl();
        $dados["iten"] = $produtos->filtro($produtos->getUrl());
        $this->loadTemplate("medicamentos/". $produtos->getUrl(), $dados);    
    }

    public function Anestesico() {
        $dados = array();
        $produtos = new Produtos();
        $iten = $produtos->getUrl();
        $dados["iten"] = $produtos->filtro($produtos->getUrl());
        $this->loadTemplate("medicamentos/". $produtos->getUrl(), $dados);    
    }
    public function Dor() {
        $dados = array();
        $produtos = new Produtos();
        $iten = $produtos->getUrl();
        $dados["iten"] = $produtos->filtro($produtos->getUrl());
        $this->loadTemplate("medicamentos/". $produtos->getUrl(), $dados);    
    }
    public function Emagrecimento() {
        $dados = array();
        $produtos = new Produtos();
        $iten = $produtos->getUrl();
        $dados["iten"] = $produtos->filtro($produtos->getUrl());
        $this->loadTemplate("medicamentos/". $produtos->getUrl(), $dados);    
    }
    public function Gripes() {
        $dados = array();
        $produtos = new Produtos();
        $iten = $produtos->getUrl();
        $dados["iten"] = $produtos->filtro($produtos->getUrl());
        $this->loadTemplate("medicamentos/". $produtos->getUrl(), $dados);    
    }
    public function Febre() {
        $dados = array();
        $produtos = new Produtos();
        $iten = $produtos->getUrl();
        $dados["iten"] = $produtos->filtro($produtos->getUrl());
        $this->loadTemplate("medicamentos/". $produtos->getUrl(), $dados);    
    }

    
}