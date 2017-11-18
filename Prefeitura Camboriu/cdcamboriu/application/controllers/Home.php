<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // carreganho o model Tabelas_model e setando um apelido de Tabelas
        $this->load->model('Tabelas_model', 'Tabelas');
        // $this->load->model('Gastos_model', 'Gastos');
		$this->load->helper('url');
    }

	public function index() {

        // carregando os dados do formulario de login
        if(isset($_POST["user_login"])) {
            $user = addslashes($_POST["user_login"]);
            $password = addslashes(md5($_POST["user_password"]));

            // pegando os dados do usuario no banco de dados
            $usuarios_info = $this->Tabelas->login();

            // com os dados corretos carregados uma seria de $_Session sao configurados
            foreach($usuarios_info as $info) {
                $userLogin = $info["user"];
                $userPassword = $info["password"];
                $_SESSION["usuario"] = $info["user"];
                $_SESSION["nivel"] = $info["nivel"];
                $_SESSION['id_user'] = $info['id_usuario'];

                if($user == $userLogin && $password == $userPassword) {
                    $_SESSION["logado"] = "true";
                    redirect("home/lei");
                }else{
                    $_SESSION["logado"] = "false";
                }
            };
        };
		$this->load->view('login');
    }

    public function inicio() {
        // pegar a session de usuario logado
		$this->Tabelas->getSession();

        // gerando a lista de nomes de pessoas com diarias cadastradas para consulta
        $dados['diarias_nome'] = $this->Tabelas->Servidor_nome();

        // carregando todos os registros de diarias
        $dados['diarias'] = $this->Tabelas->Select('diarias');

        // mes selecionado acima do rodape, referente ao gasto total
        if(isset($_POST['mes'])) {
            // pegando o numero do mes
            $mes = date('m', strtotime($_POST['mes']));
            $dados['gasto_diarias'] = $this->Tabelas->gastos_mensais($_POST['mes']);
            $dados['relatorio_diaria'] = 'Resultados do mes '.$mes;
            echo $mes;
        }else{
            $dados['filtro_gastos'] = $this->Tabelas->gastos_anuais();
            $dados['relatorio_diaria'] = 'Resultado total deste ano';
        }

        // mostrando todas as diarias que forem selecionadas por nome e mes


        if(!empty($_POST['nome_servidor'])) {
            $servidor = $_POST['nome_servidor'];
            $dados['diarias'] = $this->Tabelas->filtro('diarias', 'servidor',$servidor);
            $dados['filtro_gastos'] = $this->Tabelas->filtro_gastos_ano('diarias', 'servidor', $_POST['nome_servidor']);
            $dados['relatorio_diaria'] = 'Diárias refetente ao servidor ' . $_POST['nome_servidor'] .' deste ano ';

            if(isset($_POST['nome_servidor']) AND isset($_POST['mes_diaria']) AND !empty($_POST['mes_diaria'])) {
                $servidor = $_POST['nome_servidor'];
                $dados['filtro_gastos'] = $this->Tabelas->filtro_gastos_mes('diarias', 'servidor', $servidor, $_POST['mes_diaria']);
                $dados['diarias'] = $this->Tabelas->filtro_dados_nome_mes('servidor', $_POST['nome_servidor'], $_POST['mes_diaria']);
                $mes = date('m', strtotime($_POST['mes_diaria']));
                $dados['relatorio_diaria'] = 'Diárias refetente ao servidor: ' . $_POST['nome_servidor'] . '<br>Mês '. $mes;
            }

        }

        if(empty($_POST['nome_servidor']) AND isset($_POST['mes_diaria']) && !empty($_POST['mes_diaria'])) {
            $dados['filtro_gastos'] = $this->Tabelas->gastos_mensais($_POST['mes_diaria']);
            $dados['diarias'] = $this->Tabelas->filtro_dados_mes($_POST['mes_diaria']);
            $mes = date('m', strtotime($_POST['mes_diaria']));
            $dados['relatorio_diaria'] = 'Diárias refetente ao mês '. $mes ;
        }

        $pag = $this->Tabelas->totPag();
        foreach ($pag as $info) {
            $total = $info['c'];
        }
         // total de paginas recebe total de registros / 30 que seram mostrados em cada pagina
        $paginas = $total / 5;
        
        for($i=0; $i<$paginas; $i++) {
            $dados['paginacao'] = '<a class="button" href="./?pag='. ($i+1) . '"> ' . ($i+1) . ' </a>';
            $dados['diarias'] = $this->Tabelas->Select_limit($i);
        }

        
        

        // todos os registros de ufm
        $dados['ufm'] = $this->Tabelas->Select('ufms');

        // botoes de confirmado e cancelado
        if(isset($_POST['id_diaria'])) {
            $this->Tabelas->update('diarias', 'confirmacao', 's', 'id_diaria', $_POST['id_diaria']);
            redirect('home/inicio');
            echo $_POST['id_diaria'];
        }

        if(isset($_POST['id_cancel_diaria'])) {
            $this->Tabelas->delete('diarias', 'id_diaria', $_POST['id_cancel_diaria']);
            redirect('home/inicio');
            echo $_POST['id_cancel_diaria'];
        }

        if(isset($_POST['id_confirm_ufm'])) {
            $this->Tabelas->update('ufms', 'confirmacao', 's', 'id_ufm', $_POST['id_confirm_ufm']);
            redirect('home/inicio');
            echo $_POST['id_diaria'];
        }

        if(isset($_POST['id_cancel_ufm'])) {
            $this->Tabelas->delete('ufms', 'id_ufm', $_POST['id_cancel_ufm']);
            redirect('home/inicio');
            echo $_POST['id_diaria'];
        }

        $dados['viewName'] = 'inicio';
        $this->load->view('Template', $dados);
    }

	public function cad_diaria() {
        // pegar a session de usuario logado
        $this->Tabelas->getSession();

        // mensagem de erro caso haja algum
        $dados['msg'] = '';

		if(isset($_POST['servidor'])) {
            $dados_insert = array(
				'servidor'=>$_POST['servidor'],
				'estado_destino'=>$_POST['estado_destino'],
				'cidade_destino'=>$_POST['cidade_destino'],
				'distancia_destino'=>$_POST['distancia_destino'],
				'data_saida'=>$_POST['data_saida'],
				'data_retorno'=>$_POST['data_retorno'],
				'data_diaria'=>date('Y-m-d')
            );
			// calculo de diferenca de dias entre saida e retorno
			$saida = date('Y-m-d H:i:s', strtotime($_POST['data_saida']));
			$retorno = date('Y-m-d H:i:s', strtotime($_POST['data_retorno']));
			$t_s = strtotime($saida);
			$t_r = strtotime($retorno);
			$diferenca = $t_r - $t_s;
            $data = (float)($diferenca / (60 * 60 * 24) ); 

            // conversao de tempo exato em dias, horas, minutos;
            $data_a = new DateTime($_POST['data_saida']);
            $data_b = new DateTime($_POST['data_retorno']);
            $intervalo = date_diff($data_a,$data_b);

            $dados_insert['tempo_total'] = $intervalo->format('%D Dias %H Horas %I Minutos');

			$estado = $_POST['estado_destino'];

			if($data < 0.25) {
				$dados['msg'] = 'Periodo inferior a 6 horas';
            }

            // valor de diaria dentro do estado de santa catarina é diferente ao valor para outro estado
            $distancia = $_POST['distancia_destino'];

            if($distancia > 50) {
				if($estado == "Santa Catarina - SC") {
					$dados_insert['valor_total'] = number_format(($data * 80), 2, ",", ".");
				}else{
					$dados_insert['valor_total'] = number_format(($data * 100), 2, ",", ".");
				}
			}else{
				$dados['msg'] = "Diaria indisponível para distancia inferior a 50 km";
			}

            // metodos inserindo os campos adicionais de data de saida e retorno;
            $this->Tabelas->dado_adicional($_POST['data_saida1'], $_POST['data_retorno1'], $_POST['distancia_destino'], $_POST['estado_destino'], $dados_insert);
            $this->Tabelas->dado_adicional($_POST['data_saida2'], $_POST['data_retorno2'], $_POST['distancia_destino'], $_POST['estado_destino'], $dados_insert);
            $this->Tabelas->dado_adicional($_POST['data_saida3'], $_POST['data_retorno3'], $_POST['distancia_destino'], $_POST['estado_destino'], $dados_insert);
            $this->Tabelas->dado_adicional($_POST['data_saida4'], $_POST['data_retorno4'], $_POST['distancia_destino'], $_POST['estado_destino'], $dados_insert);
            $this->Tabelas->dado_adicional($_POST['data_saida5'], $_POST['data_retorno5'], $_POST['distancia_destino'], $_POST['estado_destino'], $dados_insert);

            $this->db->insert('diarias', $dados_insert);
            redirect('home/inicio');
        };

		$dados['viewName'] = 'cad_diaria';
        $this->load->view('Template', $dados);
    }

    public function cad_ufm() {
        // pegar a session de usuario logado
        $this->Tabelas->getSession();

        // mensagem de erro caso haja algum
        $dados['msg'] = '';

        if(isset($_POST['servidor'])) {
            $dados_insert = array(
                'servidor'=>$_POST['servidor'],
                'estado_destino'=>$_POST['estado_destino'],
                'cidade_destino'=>$_POST['cidade_destino'],
                'distancia_destino'=>$_POST['distancia_destino'],
                'data_saida'=>$_POST['data_saida'],
                'data_retorno'=>$_POST['data_retorno'],
                'data_diaria'=>date('Y-m-d')
            );
            // calculo de diferenca de dias entre saida e retorno
            $saida = date('Y-m-d H:i:s', strtotime($_POST['data_saida']));
            $retorno = date('Y-m-d H:i:s', strtotime($_POST['data_retorno']));
            $t_s = strtotime($saida);
            $t_r = strtotime($retorno);
            $diferenca = $t_r - $t_s;
            $data = (float)($diferenca / (60 * 60 * 24) );

            // conversao de tempo exato em dias, horas, minutos;
            $data_a = new DateTime($_POST['data_saida']);
            $data_b = new DateTime($_POST['data_retorno']);
            $intervalo = date_diff($data_a,$data_b);

            $dados_insert['tempo_total'] = $intervalo->format('%D Dias %H Horas %I Minutos');

            $estado = $_POST['estado_destino'];

            if($data < 0.25) {
                $dados['msg'] = 'Periodo inferior a 6 horas';
            }

            $distancia = $_POST['distancia_destino'];

            // Condiçoes definidas na lei de diarias
            if($estado != "Exterior") {
                if($distancia <= 100 && $data <= 0.5) {
                    $ufm = 6;
                    $dados_insert['ufm'] = $ufm;
                    $dados_insert['valor_total'] = $ufm * $_POST['valor_ufm'];
                }elseif($distancia > 100 && $data < 1 ) {
                    $ufm = 9;
                    $dados_insert['ufm'] = $ufm;
                    $dados_insert['valor_total'] = $ufm * $_POST['valor_ufm'];
                }elseif($data >= 1 ) {
                    $ufm = 17;
                    $dados_insert['ufm'] = $ufm;
                    $dados_insert['valor_total'] = $ufm * $_POST['valor_ufm'];
                }

                if($data >= 1 && $estado == "Distrito Federal - DF") {
                    $ufm = 25;
                    $dados_insert['ufm'] = $ufm;
                    $dados_insert['valor_total'] = number_format(($ufm * $_POST['valor_ufm']), 2, ",", ".");
                }
            }else{
                $dados_insert['valor_total'] = '400,00 Dolares' ;
            };

            $this->db->insert('ufms', $dados_insert);
            redirect('home/inicio');
        };
        $dados['viewName'] = 'cad_ufm';
        $this->load->view('Template', $dados);
    }

    public function lei() {
        // pegar a session de usuario logado
        $this->Tabelas->getSession();

        $dados['viewName'] = 'lei';
        $this->load->view('Template', $dados);
    }

    public function sair() {
        $_SESSION["logado"] = "false";
        redirect("/index.php");
    }
}