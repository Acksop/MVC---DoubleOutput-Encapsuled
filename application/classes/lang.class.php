<?php 

class Lang {
	public static function find_browser_lang(){
		$language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
		$language = strtolower($language[0].$language[1]);
		$accepted_language = array('fr','en');
		if(!in_array($language, $accepted_language)){
			$language = 'en';
		};
		return strtoupper($language);
	}
}