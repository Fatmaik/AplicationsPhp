<?php

class descricaoController extends Controller {

    public function __construct() {
        $this->produtos = new Produtos();
    }

    public function index() {
        $dados = array();
        $dados["iten"] = $this->produtos->ver("medicamentos", 1);
        $this->loadTemplate("Descricao", $dados);
    }

    public function ver($id) {
        $dados = array();
        $dados["iten"] = $this->produtos->ver("medicamentos", $id);

        $this->loadTemplate("Descricao", $dados);

        
    }


}