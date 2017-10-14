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
<<<<<<< HEAD
    public function index() {
  
        
    }
    public function teste(){
        echo 'teste';
    }
=======
>>>>>>> 29abccbe22a36a758f6e1c5e896684ab21058853
}