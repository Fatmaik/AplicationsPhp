<?php

class Cadastro{

	public function gera_user($nome, $sobrenome, $username, $senha, $email){
		
		$response = array();

		if(!$this->existe_username($username)){
			$this->new_user($nome, $sobrenome, $username, $senha, $email);
			$response = array('action' => true, 'msg'=>'Cadastro feito com sucesso');
		}else{
			$response = array('action' => false, 'msg'=>'Username já existe');
		}

		return $response;
	}

	public function modifica_user($id, $nome, $sobrenome, $senha, $email){
		$response = array();

		$this->update_user($id, $nome, $sobrenome, $senha, $email);
		return $response = array('action' => true, 'msg'=>'Cadastro alterado com sucesso');
	}

	public function desativa_user($id){
		$response = array();
		
		$dados = array(
			array('ativo', 0, 'int')
		);

		$cond = array("id_user =".$id);

		$crud = new Crud();
		$crud->update('tb_usuarios', $dados, $cond);
		
		return $response = array('action' => true, 'msg'=>'Cadastro alterado com sucesso');
	}

	private function new_user($nome, $sobrenome, $username, $senha, $email){
		$dados = array(
			array('nome', $nome, 'string'),
			array('username', $username, 'string'),
			array('sobrenome', $sobrenome, 'string'),
			array('ativo', 1, 'int'),
			array('email', $email, 'string'),
			array('senha', $senha, 'string'),
		);

		$crud = new Crud();
		$crud->insert('tb_usuarios', $dados, null);

		return 0;
	}

	private function update_user($id, $nome, $sobrenome, $senha, $email){
		$dados = array(
			array('nome', $nome, 'string'),
			array('sobrenome', $sobrenome, 'string'),
			array('email', $email, 'string'),
			array('senha', $senha, 'string'),
		);
		$cond = array("id_user =".$id);

		$crud = new Crud();
		$crud->update('tb_usuarios', $dados, $cond);

		return 0;
	}

	private function existe_username($username){
		$tabelas = array('tb_usuarios');
		$cond = array("username = '".$username."'");

		$crud =  new Crud();
		$username = $crud->select($tabelas, null, $cond, true);

		return $username[0]['registro'] > 0? true:false;
	}

}