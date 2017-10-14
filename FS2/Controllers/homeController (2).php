<?php

class homeController extends Controller {

    public function index() {
        

        $produtos = new classProd();
    


        $dados["medicamentos"] = $produtos->info("medicamentos");
        $dados["beleza"] = $produtos->info("beleza");
        $dados["saude"] = $produtos->info("saude");
        
       
        $this->loadView("Template", $dados);

        
    }
}