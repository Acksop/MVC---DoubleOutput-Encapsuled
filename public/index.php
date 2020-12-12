<?php

	define(	 'PUBLIC_PATH', __DIR__ );

	define(  'APPLICATION_PATH', dirname(dirname(__FILE__)) .
			 DIRECTORY_SEPARATOR . 'application'
			);
	
	define(
		'PAGES_PATH',
		APPLICATION_PATH . DIRECTORY_SEPARATOR .
		'pages'
	 );
	 define(
		'INC_PATH',
		APPLICATION_PATH . DIRECTORY_SEPARATOR .
		'includes'
	 );
	 define(
		'TPL_PATH',
		APPLICATION_PATH . DIRECTORY_SEPARATOR .
		'templates'
	 );
	 define(
		'CLASS_PATH',
		APPLICATION_PATH . DIRECTORY_SEPARATOR .
		'classes'
	 );
	 define(
 		'TREATMENT_PATH',
 		APPLICATION_PATH . DIRECTORY_SEPARATOR .
 		'traitements'
 	 );

//ini_set('display_errors',1);
//error_reporting( E_ALL );

// Appel de la classe encoding permettant de forcer l'utf8 si besoin
require_once CLASS_PATH . DIRECTORY_SEPARATOR . 'encoding.class.php';
 // Appel de la classe lang permettant d'identifier le langage du navigateur
require_once CLASS_PATH . DIRECTORY_SEPARATOR . 'lang.class.php';
 // Appel de la classe device permettant d'identifier le type d'affichage
require_once CLASS_PATH . DIRECTORY_SEPARATOR . 'device.class.php';
 // Appel du routage d'url en PHP
require_once CLASS_PATH . DIRECTORY_SEPARATOR . 'url.class.php';
$page = Url::url_rewrite();


 // Appel du coeur de l'application
require_once CLASS_PATH . DIRECTORY_SEPARATOR . 'application.class.php';
Application::load_page($page);


