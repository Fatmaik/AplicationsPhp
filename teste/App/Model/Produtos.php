<?php

class Produtos extends Connect{
    private $tbClientes;
    private $tbCompra;
    private $tbMedicamentos;
    private $tbSaude;
    private $tbBeleza;
    private $filtro;

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
    public function Select($tbname) {
        $array = array();
        $query = $this->dbase->query("SELECT * FROM $tbname ");
        $array = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }
    public function filtro($genero) {
        $array = array();
        $query = $this->dbase->query("SELECT * FROM medicamentos WHERE genero = '$genero' " );
        $array = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }

    public function getUrl() {
        $url = explode("index.php/medicamentos/", $_SERVER["PHP_SELF"]);
        $url = end($url);
        // array_shift($url);
        // return $t = join($url);
        return $url;

        
    }
        
    
}