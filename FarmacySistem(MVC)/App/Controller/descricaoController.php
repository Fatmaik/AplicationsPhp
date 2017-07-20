<?php

class descricaoController extends Controller {

    public function __construct() {
        $this->produtos = new Produtos();
    }

    public function index($id) {
        $dados["iten"] = $this->produtos->ver("medicamentos", $id);
        $this->loadTemplate("descricao" , $dados);
    }

    public function Medicamentos($id) {
        $dados["iten"] = $this->produtos->ver("medicamentos", $id);
        $this->loadTemplate("descricao", $dados);
        
    }

    public function saude($id) {
        $dados["iten"] = $this->produtos->ver("saude", $id);
        $this->loadTemplate("descricao", $dados);
    }
    
    public function beleza($id) {
        $dados["iten"] = $this->produtos->ver("beleza", $id);
        $this->loadTemplate("descricao", $dados);
    }


}