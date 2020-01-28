<?php

class Application {
	
	public static function load_page(array $page){
		
		require_once INC_PATH . DIRECTORY_SEPARATOR . 'session.php';
		
		if($page['action'] == 'traitementPOSTVar'){
			require_once TREATMENT_PATH . DIRECTORY_SEPARATOR . 'POSTvar' . DIRECTORY_SEPARATOR . $page['name'] . '.php';
			return;
		}
		
		//Génération du contenu spécifique à la langue choisie
		$lang = Lang::find_browser_lang();
		$translationFolder = DIRECTORY_SEPARATOR . $lang;
		//Génération du contenu spécifique aux mobiles
		$device = Device::find_mobile_device();
		$mobileFolder = '';
		if($device !== 'Other'){
			$mobileFolder = DIRECTORY_SEPARATOR . $device;
		}
		//pour chaque page et mise en tampon
		ob_start();
		require_once PAGES_PATH . $translationFolder . $mobileFolder . DIRECTORY_SEPARATOR . $page['name'] . '.php' ;
		require_once TPL_PATH . $translationFolder . $mobileFolder . DIRECTORY_SEPARATOR . $page['name'] .'.phtml' ;	
		$content = ob_get_contents();
		ob_end_clean();
		
		//Chargement du jeux de caractère utilisé pour l'encodage des fichier générant la page
		$encoding_PHTML = mb_detect_encoding(TPL_PATH . $translationFolder . $mobileFolder  . DIRECTORY_SEPARATOR . $page['name'] .'.phtml');
		$encoding_PHP = mb_detect_encoding(PAGES_PATH . $translationFolder . $mobileFolder  . DIRECTORY_SEPARATOR . $page['name'] .'.php');
		
		if($encoding_PHTML != $encoding_PHP){
			$page['name'] == 'error';
		}else{
			$encoding = $encoding_PHP = $encoding_PHTML;
		}
		
		//Chargement du Layout définitif pour l'affichage
		if(!isset($layout)){
			require_once INC_PATH . $translationFolder . $mobileFolder  . DIRECTORY_SEPARATOR . 'layout.phtml';
		}else{
			require_once INC_PATH . $translationFolder . $mobileFolder  . DIRECTORY_SEPARATOR . $layout . '.phtml';
		}
		return;
		
	}
	public function load_layout($content){
		
		/*TODO retrouver comment faire pour passez les variables de la fonction d'au dessus
		// dans cette fonction de chargement de layout... afin de charger différenteeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee
																eee
																   ee
																     e
																     e
																     e
																     e
																     e
																     e
																     e
																     e
																     e
																     e
																     
																     
																     
																     
																     .
																     .
																     
																     .
																  \	/
															      _____\_._/____
															      ==============
															      
															      
															      
															      
					POUIK, PLOUF, TOK and SCRATCH sont dans une marre d'eau, qui attendent-ils ?			*/
															      
																	

	}
	
}
