<?php

class homeController extends Controller{

    public function index() {
        $dados = array();
        $produtos = new Produtos();
        // $dados["medicamentos"] = $produtos->Select("medicamentos");
        // $dados["saude"] = $produtos->Select("saude");
        // $dados["beleza"] = $produtos->Select("beleza");   
            
       
        
        $dados["medicamentos"] = $produtos->select("test1");
        $this->loadTemplate("test", $dados);
        
    }
}