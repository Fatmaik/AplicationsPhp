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
        $query =  $this->pdo->prepare("SELECT * FROM $tbname");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function maisBaratos() {
        
    }
}