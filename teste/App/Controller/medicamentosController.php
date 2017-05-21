<?php

class medicamentosController extends Controller{

    public function index() {
        $dados = array();
        $produtos = new Produtos();
        $dados["alergia"] = $produtos->Select("medicamentos");
        $this->loadTemplate("medicamentos/Alergia", $dados);
        
    }
    public function Alergia() {
        $dados = array();
        $produtos = new Produtos();
        $dados["alergia"] = $produtos->filtro('alergia');
        $this->loadTemplate("medicamentos/Alergia", $dados);
    }
}