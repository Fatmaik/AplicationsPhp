<?php 

class CadastroController extends Controller{


    public function incluir(){
    	
    	$nome = input::post('nome');
    	$sobrenome = input::post('sobrenome');
    	$email = input::post('email');
    	$username = input::post('username');
    	$senha = input::post('senha');

    	//Codifica senha
		$code_senha = codificacao::encode_senha($senha);

		$cadastro = new Cadastro();
		$response = $cadastro->gera_user($nome, $sobrenome, $username, $senha, $email);

		if($response['action']){
			# Cadastrou load view informando sucesso

		}else{
			# Não cadastrou load view informando erro
		}
    }
}