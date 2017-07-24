<?php
class CarrinhoController extends Controller{

    public function __construct() {
        // criando uma nova instancia da classe Produtos
        $this->produtos = new Produtos();
    }

    public function index() {
        $this->loadTemplate("carrinho", array());
    }

    public function medicamentos($id) {
        $dados['item'] = $this->produtos->ver("medicamentos", $id);
        $this->loadTemplate("carrinho", $dados);
    }

    public function saude($id) {
        $dados['item'] = $this->produtos->ver("medicamentos", $id);
        $this->loadTemplate("carrinho", $dados);
    }

    public function beleza($id) {
        $dados['item'] = $this->produtos->ver("medicamentos", $id);
        $this->loadTemplate("carrinho", $dados);
    }
}