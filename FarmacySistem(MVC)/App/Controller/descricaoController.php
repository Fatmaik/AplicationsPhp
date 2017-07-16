<?php

class descricaoController extends Controller {

    public function __construct() {
        $this->produtos = new Produtos();
    }

    public function index() {
        $dados["iten"] = $this->produtos->Select("medicamentos");

        $this->loadTemplate("Descricao", $dados);
    }
}