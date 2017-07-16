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
        $query = $this->dbase->query("SELECT * FROM $tbname ORDER BY RAND() ");
        $array = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }
    public function filtro($tbname, $genero) {
        $array = array();
        $query = $this->dbase->query("SELECT * FROM $tbname WHERE genero = '$genero' " );
        $array = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }

    // metodo para capturar o conteudo do action e armazenar o item como tirulo de pesquisa na box de pesquisa
    public function getUrl() {
        $url = explode("index.php/", $_SERVER["PHP_SELF"]);
        $url = str_replace("medicamentos/", "", $url);
        $url = str_replace("saude/", "", $url);
        $url = str_replace("beleza/", "", $url);
        $url = end($url);
        return $url;  
    }

    public function ver($url, $id) {
        echo $this->getUrl();
        $array = array();
        $query = $this->dbase->query("SELECT * FROM medicamentos WHERE id = $id ");
        $array = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }   
}