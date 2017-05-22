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
    public function Select($tbname, $filtro = "") {
        $array = array();
        $query = $this->dbase->query("SELECT * FROM $tbname ");
        $array = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }
    public function filtro($tbname, $genero) {
        $array = array();
        $query = $this->dbase->query("SELECT * FROM $tbname WHERE genero = '$genero' " );
        $array = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }

    public function getUrl() {
        $url = explode("index.php/", $_SERVER["PHP_SELF"]);
        // array_shift($url);
        // $url = end($url);
        // $x = explode("/ ", $url);

        $url = str_replace("medicamentos/", "", $url);
        $url = str_replace("saude/", "", $url);
        $url = str_replace("beleza/", "", $url);
        $url = end($url);
        
        // $url = array_splice("saude/");
        // $url = array_splice("beleza/");
        
        // echo $url ."<br>";
        
       
        return $url;  
    }
        
    
}