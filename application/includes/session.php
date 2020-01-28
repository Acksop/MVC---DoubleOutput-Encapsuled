<?php
session_start();

/*RESTRICTION D'USAGE DU SITE PERSONNEL AU BLACK HAT HACKER */

//chargement en mémoire des anciennes attaques
$attempts = simplexml_load_file( APPLICATION_PATH . DIRECTORY_SEPARATOR ."bruteforce-logger.xml" , "SimpleXMLElement" , LIBXML_NOCDATA );
if($attempts->xpath("/brute-force-attack/attempt/from")) {
    foreach ($attempts->xpath("/brute-force-attack/attempt/from") as $attempt) {
        // Récupération des ip et test de corrélation actuelle
        if ($attempt['from'] == $_SERVER['REMOTE_ADDR']) {
            $page['action'] = 'default';
            $page['name'] = 'error-brute-force-attack';
            break;
        }
    }
}
/**/
/* ITERATION D'UNE POSSIBLE ATTAQUE BRUTE FORCE SUR UNE PAGE DE TRAITEMENT */

if ($page['action'] == 'traitementPOSTvar'){
    if(isset($_SESSION['brute-force-attempt'])) {
        $_SESSION['brute-force-attempt']++;
    }else{
        $_SESSION['brute-force-attempt']=1;
    }
}

/**/
/* TESTS PERMETTANT DE DEFINIR CERTAINS CAS COMME ETANT DANGEREUX*/

if (	!isset($_SESSION['current-ip'])
	|| 	!isset($_SESSION['current-time'])	){

    //Ce test permet d'identifier ceux qui veulent faire un traitement sans provenir d'une page de formulaire

	if($page['action'] == 'traitementPOSTvar'){
		$page['action'] = 'default';
		$page['name'] = 'error';
	}
}else{
	
	if(		$_SESSION['last-ip'] !== $_SERVER['REMOTE_ADDR']
		|| 	$_SESSION['last-time'] > $_SERVER['REQUEST_TIME']	){

	    //ce test permet de verifier que le demandeur est bien le meme que celui qui provient d'un formulaire

			$page['action'] = 'default';
			$page['name'] = 'error';
	}

	if( $page['action'] == 'traitementPOSTvar' && $_SESSION['brute-force-attempt'] > 5 ){

	    //ce test permet de logger une attaque brute force sur un formulaire

        $dom = new DOMDocument;
        $dom->load(APPLICATION_PATH . DIRECTORY_SEPARATOR ."bruteforce-logger.xml");

        $noeudBruteForce = $dom->getElementsByTagName("brute-force-attack")->item(0);

        $attemptNode = $dom->createElement("attempt");

        $dateNode = $dom->createElement("date");
        $textNode = $dom->createTextNode(htmlentities($_SERVER['REQUEST_TIME']));
        $dateNode->appendChild($textNode);
        $attemptNode->appendChild($dateNode);

        $ipNode = $dom->createElement("from");
        $textNode = $dom->createTextNode(htmlentities($_SERVER['REMOTE_ADDR']));
        $ipNode->appendChild($textNode);
        $attemptNode->appendChild($ipNode);

        $noeudBruteForce->appendChild($attemptNode);
        $dom->save(APPLICATION_PATH . DIRECTORY_SEPARATOR ."bruteforce-logger.xml");


        $page['action'] = 'default';
        $page['name'] = 'error-brute-force-attack';

    }

	//mise en tampon des données courante de combat
	$_SESSION['last-ip'] = $_SESSION['current-ip'];
	$_SESSION['last-time'] = $_SESSION['current-time'];
}
/**/

//actualisation des données courante du temps réel
$_SESSION['current-ip'] = $_SERVER['REMOTE_ADDR'];
$_SESSION['current-time'] = $_SERVER['REQUEST_TIME'];
$_SESSION['current-server'] = $_SERVER['SERVER_ADDR'];