<?php

class homeController extends Controller{

    public function index() {
        $dados = array();
        $produtos = new Produtos();
       
        // $dados["saude"] = $produtos->Select("saude");
        // $dados["beleza"] = $produtos->Select("beleza");   
            
       
        
        $dados["medicamentos"] = $produtos->Select("medicamentos");

        


        $this->loadTemplate("test", $dados);
        
    }
}