<?php
class saudeController extends Controller{

    public function index() {
        $dados = array();
        $produtos = new Produtos();
        $dados["iten"] = $produtos->Select("saude");
        $this->loadTemplate("medicamentos", $dados);
    }
}