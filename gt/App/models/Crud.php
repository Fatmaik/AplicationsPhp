<?php

class Crud extends Connect{

    /*Exemplo de uso dos parametros:

        $dados = array(
            array('campo1', 'bola', 'string'),
            array('campo2', '5', 'int'),
            array('campo3', '5.3', 'real')
            );

        $cond = array(
            'id = 5',
            'nome = "bruno"');

        $tbname = 'array(tb_teste, tb_teste2)';
    
    */

    /** 
      * Método de select
      * @access public 
      * @param Array $tabelas (nome da(s) tabela(s), ex. tab1, ta2, tab3...) 
      * @param Array $campos (nome do(s) campo(s), ex. campo1, campo2 ou tab1.campo1, tab2.campo2)
      * @param Array $cond (condições)
      * @param Array $contador (contador)
      * @param Boolean $debug (quando true imprimi query) 
      * @return void 
    */ 
    public function select(
        $tabelas, 
        $campos=null, 
        $cond=null, 
        $contador = null,
        $debug = false) {

 		$query = null;

 		if(is_null($campos)){
            if(is_null($contador)){
                $query = "SELECT * FROM ".$this->montaCamposComVirgula($tabelas);
            }else{
                $query = "SELECT count(*) registro FROM ".$this->montaCamposComVirgula($tabelas);
            }
 			
 		}else{
 			$query = "SELECT ".$this->montaCamposComVirgula($campos)." FROM ".$this->montaCamposComVirgula($tabelas);
 		}

 		if(!is_null($cond)){
 			$query .= $this->montaCond($cond);
 		}

        if($debug){ $this->debug($query);}else{
     		$array = array();
            $query = $this->dbase->query($query);
            $array = $query->fetchAll(\PDO::FETCH_ASSOC);
            return $array;
        }
    }


    /** 
      * Método de insert 
      * @access public 
      * @param String $tbname (nome da tabela) 
      * @param Array $dados (array de dados sendo campo, valor e tipo, os tipos devem ser string ou numeric)
      * @param Array $cond (array de condições)
      * @param Boolean $debug (quando true imprimi query) 
      * @return void 
    */ 
    public function insert(
        $tbname,
        $dados,
        $cond = null,    
        $debug = false) {

        $camposValores = $this->montaCamposValores($dados);

        if($cond){
            $condicao = $this->montaCond($cond);
            $query = 'INSERT INTO '.$tbname.$camposValores.$condicao;
        }else{
            $query = 'INSERT INTO '.$tbname.$camposValores;
        }
   
        if($debug){ $this->debug($query);}else{
            $stm = $this->dbase->prepare($query);   
            $stm->execute(); 
        } 
    }  

    /** 
      * Método de update 
      * @access public 
      * @param String $tbname (nome da tabela) 
      * @param Array $dados (array de dados sendo campo, valor e tipo, os tipos devem ser string ou numeric)
      * @param Array $cond (array de condições)
      * @param Boolean $debug (quando true imprimi query) 
      * @return void 
    */ 
    public function update($tbname,
        $dados,
        $cond,    
        $debug = false){

        $campos = $this->montaCamposValoresUpdate($dados);
        $condicao = $this->montaCond($cond);
        $query = 'UPDATE '.$tbname.' SET '.$campos.$condicao;

        if($debug){ $this->debug($query);}else{
            $stm = $this->dbase->prepare($query);   
            $stm->execute(); 
        } 

    }

    /** 
      * Método de delete 
      * @access public 
      * @param String $tbname (nome da tabela) 
      * @param Array $cond (array de condições)
      * @param Boolean $debug (quando true imprimi query) 
      * @return void 
    */ 
    public function delete(
        $tbname, 
        $cond,    
        $debug = false){

        $condicao = $this->montaCond($cond);
        $query = 'DELETE FROM '.$tbname.$condicao;

        if($debug){ $this->debug($query);}else{
            $stm = $this->dbase->prepare($query);   
            $stm->execute(); 
        } 

    }

    private function debug($query){
        echo $query;
        die();
    }

    private function montaCond($cond){

        $stringCond = ' WHERE';

        for($i=0; $i < count($cond); $i++){

            if($i > 0){
                $stringCond .= ' AND '.$cond[$i];
            }else{
                $stringCond .= ' '.$cond[$i];
            }
        }

        return $stringCond;
    }

<<<<<<< HEAD
    public function insert(tbname) {
        // if (!empty($categoria) && !empty($titulo) && !empty($autor)):
        $array = array();
        $colunas = "SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE table_schema = 'db_gt' AND table_name = " . $tbname;
        $col = $this->dbase->query($colunas);
        $array = $col->fetchAll(\PDO::FETCH_ASSOC);
        var_dump($array);
        // foreach($array as $key => $val):  
        // $sql = "INSERT INTO $tbname (Name, email) VALUES (?, ?)";   
        // $stm = $this->dbase->prepare($sql);   
        // $stm->bindValue(1, $array[0]);   
        // $stm->bindValue(2, $array[1]);   
            
        // $stm->execute(); 
        // endforeach;

        // for($i=0; $i<count($array); $i++):  

        //     $colunas = "SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE table_schema = 'db_gt' AND table_name = " . $tbname;
                    
                    
        //     $sql = "INSERT INTO $tbname (Name, email) VALUES (?, ?)";   
        //     $stm = $this->dbase->prepare($sql);   
        //     $stm->bindValue(1, $array[0]);   
        //     $stm->bindValue(2, $array[1]);   
            
        //     $stm->execute();
        // endfor;
        
    }  
=======
    private function montaCamposValores($dados){

        $stringCampos = '(';
        $stringValues = ' VALUES(';

        for($i=0; $i < count($dados);$i++){

            $dados[$i][1] = $dados[$i][2] == 'string'? '"'.$dados[$i][1].'"':$dados[$i][1]; 

            if($i == (count($dados) - 1)){
                $stringCampos .= $dados[$i][0].')';
                $stringValues .= $dados [$i][1].')';
            }else{
                $stringCampos .= $dados[$i][0].', ';
                $stringValues .= $dados [$i][1].', ';}
        }

        return $stringCampos.$stringValues;
    }

    private function montaCamposValoresUpdate($dados){
        $string = '';

        for($i=0; $i < count($dados);$i++){

            $dados[$i][1] = $dados[$i][2] == 'string'? '"'.$dados[$i][1].'"':$dados[$i][1]; 

            if($i == (count($dados) - 1)){
                $string .= $dados[$i][0].' = '.$dados[$i][1];
            }else{
                $string .= $dados[$i][0].' = '.$dados[$i][1].', ';}

        }

        return $string;
    }

    private function montaCamposComVirgula($campos){
        $stringCampos = null;

        for($i=0; $i < count($campos);$i++){
            if($i == (count($campos) - 1)){
                $stringCampos .= $campos[$i];
            }else{
                $stringCampos .= $campos[$i].', ';
            }
        }

        return $stringCampos;
    }

>>>>>>> 29abccbe22a36a758f6e1c5e896684ab21058853

}