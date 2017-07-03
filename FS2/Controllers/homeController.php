<?php

class homeController extends Controller {

    public function index() {
        $this->loadTemplate("LojaVirtual");

        $produtos = new Produtos();
       
        $produtos= new Produtos($conexao);

        
    }
}