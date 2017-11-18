<?php
class HomeController extends Controller{
	public function __construct(){
    	session_start();
    	/* Verifica se a section está criada*/
    	if(isset($_SESSION['usuario']['logado']) && $_SESSION['usuario']['id_session'] == SESSION_ID ){
    		echo 'logou';
    	}else{
    		header('Location:'.BASE_URL.'login/auth');
    	}
    }
	
    public function teste(){
        echo 'teste';
    }

}
