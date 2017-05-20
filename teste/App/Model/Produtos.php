<?php

class Produtos extends Connect{
    private $tbClientes;
    private $tbCompra;
    private $tbMedicamentos;
    private $tbSaude;
    private $tbBeleza;

    public function __construct() {
        parent::__construct();
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
    public function select($tbname) {
        // $query = array();
        $query = $this->dbase->query("SELECT * FROM $tbname ");
        // $query->bindParam(":tbname", $tbname);
        $query->execute();
        $query->fetchAll(\PDO::FETCH_ASSOC);
        return $query;
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
    public function test() {
        echo "tentProdddd";
    }
    
}