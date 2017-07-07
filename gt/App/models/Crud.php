<?php

class Crud extends Connect{
    
    public function select($tabelas, $campos=null, $cond=null){
 		$sql = null;

 		if(is_null($campos)){
 			$sql = "SELECT * FROM ".$tabelas;
 		}else{
 			$sql = "SELECT ".$campos." FROM ".$tabelas;
 		}

 		if(!is_null($cond)){
 			$sql .= " ".$cond;
 		}

 		$array = array();
        $query = $this->dbase->query($sql);
        $array = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }

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

}