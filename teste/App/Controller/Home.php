<?php

class Home extends Controller{

    public function index() {
        
        $this->loadView("lojaVirtual");
        echo $produtos->info("medicamentos");
            echo $produtos->info("saude");
            echo $produtos->info("beleza");
    }
}