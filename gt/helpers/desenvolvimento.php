<?php

Class Desenvolvimento{

	public static function array_shift(array $a){
		$new_array = array();

		for($x = 1; $x < count($a); $x++){
			array_push($new_array, $a[$x]);
		}

		return $new_array;
	}

	public static function debug_array(array $a){
		echo '<pre>';
		print_r($a);
		echo '</pre>';
		die();
	}

	public static function debug_array_dump(array $a){
		echo '<pre>';
		var_dump($a);
		echo '</pre>';
		die();
	}
}