<?php
/* Helper para tratamento de moedas*/

class Moedas{

	public static function brasileira($value){
		return 'R$ '.$value;
	}

	public static function americana($value){
		return 'U$'.$value;
	}
}

