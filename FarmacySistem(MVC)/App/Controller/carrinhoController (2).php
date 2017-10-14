<?php
class CarrinhoController extends Controller{

    public function __construct() {
        // criando uma nova instancia da classe Produtos
        $this->produtos = new Produtos();
    }

    public function index() {
        echo "test";
    }

    public function medicamentos($id) {
        $dados['item'] = $this->produtos->ver("medicamentos", $id);

        $this->produtos->carrinho_add();
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