<?php

class classProd extends Connect{
    private $pdo;
    private $tbClientes;
    private $tbCompra;
    private $tbMedicamentos;
    private $tbSaude;
    private $tbBeleza;

    // public function __construct() { 
    //     $this->tbcompra = "compra";
    //     $this->tbMedicamentos = "medicamentos";
    //     $this->tbBeleza = "beleza";
    //     $this->tbSaude = "saude";
    //     $this->tbClientes = "clientes";
    // }
    public function select($tabelas, $campos=null, $cond=null){
 		$sql = null;

 		if(is_null($campos)){
 			$sql = "SELECT * FROM ".$tabelas;
 		}else{
 			$sql = "SELECT ".$campos." FROM ".$tabelas;
 		}

 		if(!is_null($cond)){
 			$sql .= " ".$cond;
 		}

 		$array = array();
        $query = $this->dbase->query($sql);
        $array = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }

    public function test($test) {
        echo $test;
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
    // public function Select($tbname) {
    //     $query = $this->pdo->prepare("SELECT * FROM $tbname ");
    //     $query->execute();
    //     return $query->fetchAll(\PDO::FETCH_ASSOC);
    // }
    public function info($tbname) {
        $selBaratos = $this->select($tbname);
        $html = '';
        foreach($selBaratos as $info) {
            $html .=    "<p class='prod'>" .
                        "<img class=img src=" . $info['local_armazem'] . $info['nome'] . ".jpg alt='Medicamento'><br>" .
                        "<span>" . $info['nome'] . "<br><br>" . $info['descricao_prod'] . "</span><br>" .
                        "<span1>R$" . $info['valor'] . ",00<br></span1><br>" . 
                        "<img class='carrinho' src='../Assets/css/EstiloLV/img/carrinho.png' alt='carrinho de compras'><br></p>";
        }
        return $html;
    }
}