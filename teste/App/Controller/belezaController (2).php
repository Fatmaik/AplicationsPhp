<?php

class belezaController extends Controller {

    public function index() {
        $dados = array();
        $produtos = new Produtos();
        $dados["iten"] = $produtos->Select("beleza");
        $this->loadTemplate("beleza", $dados); 
    }

    public function Cabelo() {
        $dados = array();
        $produtos = new Produtos();
        $iten = $produtos->getUrl();
        $dados["iten"] = $produtos->filtro("beleza", $produtos->getUrl());
        $this->loadTemplate("beleza/". $produtos->getUrl(), $dados); 
    }

    public function Maos() {
        $dados = array();
        $produtos = new Produtos();
        $iten = $produtos->getUrl();
        $dados["iten"] = $produtos->filtro("beleza", $produtos->getUrl());
        $this->loadTemplate("beleza/". $produtos->getUrl(), $dados); 
    }

    public function Maquiagem() {
        $dados = array();
        $produtos = new Produtos();
        $iten = $produtos->getUrl();
        $dados["iten"] = $produtos->filtro("beleza", $produtos->getUrl());
        $this->loadTemplate("beleza/". $produtos->getUrl(), $dados); 
    }

    public function Perfumes() {
        $dados = array();
        $produtos = new Produtos();
        $iten = $produtos->getUrl();
        $dados["iten"] = $produtos->filtro("beleza", $produtos->getUrl());
        $this->loadTemplate("beleza/". $produtos->getUrl(), $dados); 
    }

    public function Pes() {
        $dados = array();
        $produtos = new Produtos();
        $iten = $produtos->getUrl();
        $dados["iten"] = $produtos->filtro("beleza", $produtos->getUrl());
        $this->loadTemplate("beleza/". $produtos->getUrl(), $dados); 
    }

    public function Tinturas() {
        $dados = array();
        $produtos = new Produtos();
        $iten = $produtos->getUrl();
        $dados["iten"] = $produtos->filtro("beleza", $produtos->getUrl());
        $this->loadTemplate("beleza/". $produtos->getUrl(), $dados); 
    }
}