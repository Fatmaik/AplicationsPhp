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

        if(!empty($id)) {
            $dados["iten"] = $this->produtos->ver("medicamentos", $id);
            $this->loadTemplate("descricao", $dados);
        }else{
            header("Location:/error");
        }   
    }

    public function saude($id) {
        
        if(!empty($id)) {
            $dados["iten"] = $this->produtos->ver("saude", $id);
            $this->loadTemplate("descricao", $dados);
        }else{
            header("Location:/error");
        }
    }
    
    public function beleza($id) {
        
        if(!empty($id)) {
            $dados["iten"] = $this->produtos->ver("beleza", $id);
            $this->loadTemplate("descricao", $dados);
        }else{
            header("Location:/error");
        }
    }


}