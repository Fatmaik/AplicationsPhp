<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabelas_model extends CI_Model{
    private $dbase;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // metodo para saber se o usuarui esta logado
    public function getSession() {
        if($_SESSION["logado"] != "true") {
            session_destroy();
            redirect('home');
        }
    }

    // metodo de login
    public function login() {
        $this->db->where('user', $this->input->post('user_login'));
        $this->db->where('password', md5($this->input->post('user_password')));

        $query = $this->db->get('usuarios');

        if ($query->num_rows == 1) {
            return true; // RETORNA VERDADEIRO
        }
        return $query->result_array();
    }

    // select comum
    public function Select($tbname = null) {
        $query = $this->db->query("SELECT * FROM $tbname ORDER BY data_saida DESC");
        return $query->result_array();
    }

    public function Select_limit($limit) {
        $query = $this->db->quert("SELECT * FROM diarias LIMIT '$limit';");
        return $query->result_array();
    }

    public function update($tabela, $campo, $valor, $condicao, $id) {
        $query = $this->db->query("UPDATE $tabela SET $campo = '$valor' WHERE $condicao = '$id' ");
    }

    // metodo acha o item especifico que foi escolhido no menu de produtos
    public function filtro($tbname, $genero = null, $valor= null) {
        $query = $this->db->query("SELECT * FROM $tbname WHERE $genero = '$valor' ORDER BY data_saida desc " );
        return $query->result_array();
    }

    public function filtro_gastos_ano($tbname, $genero = null, $valor= null) {
        $query = $this->db->query("SELECT sum(valor_total) as Total FROM $tbname WHERE $genero = '$valor' and YEAR(data_saida) = YEAR(now())");
        return $query->result_array();
    }

    public function filtro_gastos_mes($tbname, $genero = null, $valor= null, $mes_diaria = null) {
        $query = $this->db->query("SELECT sum(valor_total) as Total FROM $tbname WHERE $genero = '$valor' and MONTH(data_saida) =  MONTH('$mes_diaria')");
        return $query->result_array();
    }

    public function filtro_dados_nome_mes($condicao = null, $valor = null, $mes_diaria = null) {
        $query = $this->db->query("SELECT diarias.* FROM diarias WHERE $condicao = '$valor' AND MONTH(data_saida) = MONTH('$mes_diaria') ");
        return $query->result_array();
    }

    public function filtro_dados_mes($mes_diaria = null) {
        $query = $this->db->query("SELECT diarias.* FROM diarias WHERE MONTH(data_saida) = MONTH('$mes_diaria') ");
        return $query->result_array();
    }

    public function filtro_gastos_mes_tot($tbname, $mes_diaria = null) {
        $query = $this->db->query("SELECT sum(valor_total) as Total FROM $tbname WHERE MONTH(data_saida) =  MONTH('$mes_diaria')");
        return $query->result_array();
    }

    // metodo sendo usado para carregas os servidores que possuem diarias cadastradas no banco
    public function Servidor_nome() {
        $query = $this->db->query("SELECT servidor FROM diarias WHERE estado_destino != 'Exterior' GROUP BY servidor");
        return $query->result_array();
    }

    public function delete($tabela, $condicao, $valor) {
        $query = $this->db->query("DELETE FROM $tabela WHERE $condicao = '$valor' ");
    }

    public function gastos_mensais($mes) {
        $query = $this->db->query("SELECT sum(valor_total) as Total FROM diarias
            where MONTH(data_saida) =  MONTH('$mes');"
        );
        return $query->result_array();
    }

    // resultado gerado pelo ano
    public function gastos_anuais() {
        $query = $this->db->query("SELECT sum(valor_total) as Total FROM diarias
            WHERE YEAR(data_saida) = YEAR(now())
        ");
        return $query->result_array();
    }

    // metodo que insere os campos adcionais de datas de saida e retorno
    public function inserir_mais($servidor, $estado_destino, $cidade_destino, $distancia_destino, $data_saida, $data_retorno, $valor_total, $data_diaria, $tempo_total) {
        $this->db->query("INSERT INTO diarias (id_diaria, servidor, estado_destino, cidade_destino, distancia_destino, data_saida, data_retorno, valor_total, data_diaria, tempo_total) VALUES
                        (default, '$servidor', '$estado_destino', '$cidade_destino', '$distancia_destino', '$data_saida', '$data_retorno', '$valor_total', '$data_diaria', '$tempo_total')");
    }

    // configuracao dos daos para chamar o metodo acima de inserir_mais
    public function dado_adicional($data_saida, $data_retorno, $distancia, $estado, $dados_insert = array()) {
        if(isset($data_saida)) {
            $saida = date('Y-m-d H:i:s', strtotime($data_saida));
            $retorno = date('Y-m-d H:i:s', strtotime($data_retorno));
            $t_s = strtotime($saida);
            $t_r = strtotime($retorno);
            $diferenca = $t_r - $t_s;
            $data = (float)($diferenca / (60 * 60 * 24) );

            if($distancia > 50) {
                if($estado == "Santa Catarina - SC") {
                    $valor_total= number_format(($data * 80), 2, ",", ".");
                }else{
                    $valor_total = number_format(($data * 100), 2, ",", ".");
                }
            }else{
                $dados['msg'] = "Diaria indisponível para distancia inferior a 50 km";
            }

            // conversao de tempo exato em dias, horas, minutos;
            $data_a = new DateTime($data_saida);
            $data_b = new DateTime($data_retorno);
            $intervalo = date_diff($data_a,$data_b);

            $tempo_total = $intervalo->format('%D Dias %H Horas %I Minutos');
            $this->inserir_mais($dados_insert['servidor'],
                                        $dados_insert['estado_destino'],
                                        $dados_insert['cidade_destino'],
                                        $dados_insert['distancia_destino'],
                                        $data_saida,
                                        $data_retorno,
                                        $valor_total ,
                                        $dados_insert['data_diaria'],
                                        $tempo_total
            );
        }
    }

    public function getPag() {
        return $this->pag;
    }

    public function setPag($pag) {
        $this->pag = $pag;
    }

    public function selNext() {
        // $pg calcula pagina mais limite de dados para informar na tela pelo select
        $pg = 1;
        // condicao para setar valor do pg caso exista um valor no $pag
        if(isset($_GET['pag']) && !empty($_GET['pag'])) {
            $pg = addslashes($_GET['pag']);
        }
        // calculo de paginanao para o link;
        $this->setPag(($pg - 1) * 30);
        $p = $this->getPag();

        $sel = "SELECT * from diarias limit  $p, 10 ";
        $query = $this->db->query($sel);
        return $query->result_array();
    }

    public function id($i) {
        $allPages = $this->selNext();
        foreach($allPages as $info) {
            // parametro da funcao $i, sendo ultilizado no array gerado pelo foreach,
            // para recever totos os dados do db direto na table html
            echo $info[$i]."<br>";
        }    
    }

    // metodo para paginação
    public function totPag() {
        $query = $this->db->query("SELECT count('id_diaria') as c FROM diarias");
        return $query->result_array();
    }
}