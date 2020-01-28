<?php 
class Url
{
	
	const PHP_ACTION_VARIABLE ='--%3E';
	
	static function link_rewrite($page, $params = array()){
		return self::link_rewrite_slashParam($page, $params);
	}
	
	static function link_rewrite_slashParam($page, $params = array())
	{
		$stringParams = '';
		foreach($params as $key => $values){
			$stringParams .= "/" . $key ."/" . $values;
		}
		return (('home' == $page) ? '/' : '/' . $page . $stringParams);
		
		return $page;
		
	}
	
	static function link_rewrite_appParam($page, $params = array(), $action = 'default')
	{
		$stringParams = '';
		foreach($params as $key => $values){
			$stringParams .= "/" . $key ."/" . $values;
		}
		if ( $action !== 'default'){ $stringAction = self::PHP_ACTION_VARIABLE . $action; }
		return (('home' == $page) ? '/' : $stringParams . '/' . $page . $stringAction );
	
		return $page;
	
	}
	
	static function controlLink_rewrite($page){
		return '/' . 'dataControl' . '/' . $page;
	}
	
	private function get_slashParam_from_url($url){

		$page['slashParams'] = array();
		
		$urlTrim = trim( $url , '/' );
		$urlParts = explode('/' , $urlTrim );
		
		array_shift($urlParts);
		
		$nbFullUrlParts = count($urlParts);
		$first_newSlashVar_Parts = array();
		$it_slash = 0;
		
		foreach($urlParts as $value){
			$first_newSlashVar_Parts[] = $value;
		}
		
		for($i=0 ; $i < ($nbFullUrlParts/2) ; $i++){
			$key = $i*2;
			$key = $first_newSlashVar_Parts[$key];
			if(isset($first_newSlashVar_Parts[($i*2+1)])){
				$value = $first_newSlashVar_Parts[($i*2+1)];
			}else{
				$value = '';
			}
			$page['slashParams'][$key] = $value;
			$it_slash++;
		}
			
		return $page['slashParams'];
		
	}
	private function get_queryParam_from_url($url){
		
		$page['getParams'] = array();
		
		$fullUrlTrim = trim( $url , '/' );
		$fullUrlParts = explode('/' , $fullUrlTrim );
		
		$oldGet_PhpVariables = explode("?",$fullUrlParts[0]);
		
		$tempParams = array();
		if(isset($oldGet_PhpVariables[1])){
			$oldGetVar_Parts = explode("&",$oldGet_PhpVariables[1]);
			$allOldGetVar_Parts = array();
			$first_oldGetVar_Parts = array();
			foreach($oldGetVar_Parts as $value){
				$allOldGetVar_Parts[] = explode("=",$value);
			}
			foreach($allOldGetVar_Parts as $value){
				foreach($value as $values){
					$first_oldGetVar_Parts[] = $values;
				}
			}
			$tempParams = Url::params_rewrite($first_oldGetVar_Parts);
			
			$page['getParams'] = $tempParams[1];
			
				
		}
		
		return $page['getParams'];

	}
	private function get_multipleQueryParam_from_url($url){

		$page['multipleGetParams'] = array();
		
		$fullUrlTrim = trim( $url , '/' );
		$fullUrlParts = explode('/' , $fullUrlTrim );
		$it_get = 0;
		foreach($fullUrlParts as $value){
				
			$next_oldGet_PhpVariables = explode("?",$value);
			$tempParams = array();
			if(isset($next_oldGet_PhpVariables[1])){
				$next_GetVar_Parts = explode("&",$next_oldGet_PhpVariables[1]);
				$next_allOldGetVar_Parts = array();
				$next_oldGetVar_Parts = array();
				foreach($next_GetVar_Parts as $values){
					$next_allOldGetVar_Parts[] = explode("=",$values);
				}
				foreach($next_allOldGetVar_Parts as $value){
					foreach($value as $values){
						$next_oldGetVar_Parts[] = $values;
					}
				}
		
				$tempParams = Url::params_rewrite($next_oldGetVar_Parts);
				
				$page['multipleGetParams'][$it_get]['name'] = $next_oldGet_PhpVariables[0];
				$page['multipleGetParams'][$it_get]['params'] = $tempParams[1];
				
				++$it_get;
					
			}
				
		}
		
		return $page['multipleGetParams'];
	}
	
	private function get_appParam_from_url($url){
		
		$page['appParams'] = array();
		
		$it_app = 0;
		$fullUrlTrim = trim( $url , '/' );
		$fullUrlParts = explode('/' , $fullUrlTrim );
		$lastUrlParts = array_pop($fullUrlParts);
		$lastPartUrl = explode(self::PHP_ACTION_VARIABLE,$lastUrlParts);
		$page['appParams']['appName'] = $lastPartUrl[0];
		if(isset($lastPartUrl[1])){
			$page['appParams']['appAction'] = $lastPartUrl[1];
		}else{
			$page['appParams']['appAction'] = 'default';
		}
		$nbFullUrlParts = count($fullUrlParts);
		$first_itxSlashVar_Parts = array();
		
		
		foreach($fullUrlParts as $value){
			$first_itxSlashVar_Parts[] = $value;
		}
		for($i=0 ; $i< ($nbFullUrlParts/2) ; $i++){
			$key = $i*2;
			$key = $first_itxSlashVar_Parts[$key];
			$value = ($i*2)+1 ;
			if(isset($first_itxSlashVar_Parts[$value])){
				$value = $first_itxSlashVar_Parts[$value];
			}else{
				$value = '';
			}
			$page['appParams'][$key] = $value;
			$it_app++;
		}
		
		return $page['appParams'];
		
	}
	private function get_slashID_from_url($url){

		$page['idParams'] = array();
		
		$fullUrlTrim = trim( $url , '/' );
		$typeUrlParts = explode('/' , $fullUrlTrim );
		$lastPartUrl = array_pop($typeUrlParts);
		$lastPartUrl = explode(self::PHP_ACTION_VARIABLE,$lastPartUrl);
		$lastPartUrl = array_shift($lastPartUrl);
		
		array_push($typeUrlParts,$lastPartUrl);
		
		$page['idParams']['categorie'] = array();
		$page['idParams']['type'] = array();
		$page['idParams']['article'] = array();
		
		$categories = array();
		
		foreach($typeUrlParts as $value){
			$categories[] = $value;
		}
		if(isset($typeUrlParts[1])){
			$page['idParams']['categorie'] = array_shift($categories);
			$page['idParams']['article'] = array_pop($categories);
			$page['idParams']['type'] = $categories;
		}
		
		return $page['idParams'];
	}
	
	static function url_rewrite()
	{
		
		$page = array();
		$page['name'] = '';
		
		$page['action'] = '';
		
		$page['getParams'] = array();
		$page['slashParams'] = array();
		$page['multipleGetParams'] = array();
		$page['appParams'] = array();
		$page['idParams'] = array();
		
		$url = $_SERVER['REQUEST_URI'];
		$urlTrim = trim( $url , '/' );
		$urlParts = explode('/' , $urlTrim );
		$urlQueryParts = explode('?' , $urlParts[0] );
		
		//Début -------------------------------------Récupération du nom de la page
		
		($urlParts[0] == 'CV_Mm' ||
		  $urlParts[0] == 'index' ||
		   $urlParts[0] == '' ) ? $page['name']='home' : $page['name']=$urlParts[0];
		
		if($urlParts[0] == 'dataControl'){
			$page['action'] = 'traitementPOSTVar';
			$page['name'] = $urlParts[1];
			return $page;
		}
		
		//Début -------------------------------------Récupération de l'action
		$action_PhpVariables = explode( self::PHP_ACTION_VARIABLE,$urlTrim );
		if(isset($action_PhpVariables[1])){
			$page['action'] = $action_PhpVariables[1];
		}
		
		
		$page['slashParams'] = self::get_slashParam_from_url($url);

		$page['getParams'] = self::get_queryParam_from_url($url);
		
		$page['multipleGetParams'] = self::get_multipleQueryParam_from_url($url);
		
		$page['appParams'] = self::get_appParam_from_url($url);
		
		$page['idParams'] = self::get_slashID_from_url($url);
		
		
		//Test de la page reçue
		
		$lang = Lang::find_browser_lang();
		$translationFolder = DIRECTORY_SEPARATOR . $lang;
		$device = Device::find_mobile_device();
		$mobileFolder = '';
		if($device !== 'Other'){
			$mobileFolder = DIRECTORY_SEPARATOR . $device;
		}
		$pageFile = PAGES_PATH . $translationFolder . $mobileFolder . DIRECTORY_SEPARATOR . $page['name'] . '.php';
		//$appFile = PAGES_PATH . $translationFolder . $mobileFolder . DIRECTORY_SEPARATOR . $page['idParams']['article'] . '.php';
		if(!file_exists($pageFile)){
			//if(!file_exists($appFile)){
				$page['name'] = 'error';
			//}else{
			//	$page['name'] = $page['idParams']['article'];
			//}
		}
		
		return $page;
		
	}
	
	static function params_rewrite($listOfParams){
	
		$params = array();
		$params['name'] = '';
		$params['params'] = array();
		
		//vérification du nombre de parametres: s'il n'existe pas autant de clé que
		// de valeurs on sort de la fonction et on renvoie une page d'erreur.
		$nbParams = count($listOfParams);
		if ( $nbParams%2 != 0 ) {
			$params['name'] = 'error';
			$params['params'] = array(type=>"misplaced or uncomprehensib' $type \$_GET Variables");
			return $page;
		}else if ( $listOfParams != 0 ){
			$values = array();
			$keys = array();
			foreach( $listOfParams as $key => $value ){
				if($key%2 != 0) {
					$values[] = $value;				
				} else {
					$keys[] = $value;
				}
			}
			$params['params'] = array_combine($keys, $values);
		}
		$arrayToReturn = array();
		$arrayToReturn[0] = $params['name'];
		$arrayToReturn[1] = $params['params'];
		
		return $arrayToReturn;
	}
}
