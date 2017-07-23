<?php
class CarrinhoController extends Controller{

    public function __construct() {
        $this->produtos = new Produtos();
    }
    
    public function index() {
        $this->loadTemplate("carrinho", array());
    }
}