<?php

class LoginController extends Controller{


    public function auth() {
    	$dados = array('a', 'b', 'c');

    	$this->loadTemplate('login', $dados);
    }

    private function autentica(){

    	$_SESSION['usuario']['logado'] = true;
    	$_SESSION['usuario']['id_session'] = 
    	$_SESSION['usuario']['id_user'] = 'Thiago';
    	$_SESSION['usuario']['nome'] = 'Thiago';
		$_SESSION['usuario']['sobrenome'] = 'Thiago';

    }


}