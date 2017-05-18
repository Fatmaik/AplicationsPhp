<?php

class homeController extends Controller{

    public function index() {
        $produtos = new Produtos();
        $dados["medicamentos"] = $produtos->Select("medicamentos");
        $dados["saude"] = $produtos->info("saude");
        $dados["beleza"] = $produtos->info("beleza");   
            
        $dados['test'] = "testando a view";
        $this->loadView("lojaVirtual", $dados);
        
    }
}