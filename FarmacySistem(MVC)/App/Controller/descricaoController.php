<?php

class descricaoController extends Controller {

    public function __construct() {
        $this->produtos = new Produtos();
    }

    public function medicamentos($id) {
        $dados["iten"] = $this->produtos->ver("medicamentos", $id);
        $this->loadTemplate("Descricao", $dados);
    }
    public function saude($id) {
        $dados["iten"] = $this->produtos->ver("saude", $id);
        $this->loadTemplate("Descricao", $dados);
    }
    public function beleza($id) {
        $dados["iten"] = $this->produtos->ver("beleza", $id);
        $this->loadTemplate("Descricao", $dados);
    }


}