<?php 

class TesteController extends Controller{

	public function __construct(){

    	echo '-Esse controller tem objetivo para testar de forma mais rapida o desenvolvimento<br>';
    }

    public function crud(){

    	/*echo '--Metodo de insert<br><br>';

    	$tbname = 'tb_teste'; 
        $dados = array(
            array('campo1', 'bola', 'string'),
            array('campo2', '5', 'int'),
            array('campo3', '5.3', 'real')
            );

        $cond = array(
            'id = 5',
            'nome = "bruno"');

    	$crud = new Crud();
    	$crud->insert($tbname, $dados, $cond, true);*/

    	/*echo '--Metodo de select<br><br>';

    	$tabelas = array('tabela1', 'tabela2'); 
        $campos = array('campo1', 'campo2', 'campo3');

        $cond = array(
            'id = 5',
            'nome = "bruno"');

    	$crud = new Crud();
    	$crud->select($tabelas, $campos, $cond, true);*/

        /*echo '--Metodo de update<br><br>';

        $tbname = 'tb_teste'; 
        $dados = array(
            array('campo1', 'bola', 'string'),
            array('campo2', '5', 'int'),
            array('campo3', '5.3', 'real')
            );

        $cond = array(
            'id = 5',
            'nome = "bruno"');

        $crud = new Crud();
        $crud->update($tbname, $dados, $cond, true);*/

        /*echo '--Metodo de delete';

        $tbname = 'tb_teste'; 

        $cond = array(
            'id = 5',
            'nome = "bruno"');

        $crud = new Crud();
        $crud->delete($tbname, $cond, true);*/

        $cadastro =  new Cadastro();
        #$cadastro->gera_user('bruno','pastorello','bruno.pastorello', '123', 'bruno@gmail.com');
        $cadastro->modifica_user(3,'Bruno','Pastorello','1234', 'bruno.pastorello@gmail.com');

    }
}