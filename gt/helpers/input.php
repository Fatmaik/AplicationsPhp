<?php
/* Helper para tratamento de input's contra sql injection*/

class Input{

	public static function get($name){
		$input = isset($_GET[$name])? $_GET[$name] : null;
		return preg_replace('/[^[:alnum:]_]/', '',$input);
	}

	public static function post($name){
		$input = isset($_POST[$name])? $_POST[$name] : null;
		return preg_replace('/[^[:alnum:]_]/', '',$input);
	}

}