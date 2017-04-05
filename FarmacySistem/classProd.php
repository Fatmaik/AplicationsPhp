<?php
require_once 'conexao.php';
class Produtos{
    private $pdo;
    private $tbClientes;
    private $tbCompra;
    private $tbMedicamentos;
    private $tbSaude;
    private $tbBeleza;

    public function __construct($pdo) {
        return $this->pdo = $pdo->connect();
        $this->tbcompra = "compra";
        $this->tbMedicamentos = "medicamentos";
        $this->tbBeleza = "beleza";
        $this->tbSaude = "saude";
        $this->tbClientes = "clientes";
    }
    public function getTbCompra() {
        return $this->tbcompra;
    }
    public function getMedicamentos() {
        return $this->tbMedicamentos;
    }
    public function getBeleza() {
        return $this->tbBeleza;
    }
    public function getSaude() {
        return $this->tbSaude;
    }
    public function getClientes() {
        return $this->tbClientes;
    }
    public function Select($tbname) {
        $query =  $this->pdo->prepare("SELECT * FROM $tbname ");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function info($tbname) {
        $selBaratos = $this->select($tbname);
        $html = '';
        foreach($selBaratos as $info) {
            $html .=    "<p class='prod'>" .
                        "<img class=img src=" . $info['local_armazem'] . $info['nome'] . ".jpg alt='Medicamento'><br>" .
                        "<span>" . $info['nome'] . "<br><br>" . $info['descricao_prod'] . "</span><br>" .
                        "<span1>R$" . $info['valor'] . ",00<br></span1><br>" . 
                        "<img class='carrinho' src='css/EstiloLV/img/carrinho.png' alt='carrinho de compras'><br></p>";
        }
        return $html;
    }
}