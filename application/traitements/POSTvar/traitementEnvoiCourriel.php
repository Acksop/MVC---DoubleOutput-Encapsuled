<?php
function emailValide($email){
	// Auteur : bobocop (arobase) bobocop (point) cz
	// Traduction des commentaires par mathieu

	// Le code suivant est la version du 2 mai 2005 qui respecte les RFC 2822 et 1035
	// http://www.faqs.org/rfcs/rfc2822.html
	// http://www.faqs.org/rfcs/rfc1035.html

	$atom   = '[-a-z0-9!#$%&\'*+\\/=?^_`{|}~]';   // caractères autorisés avant l'arobase
	$domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)'; // caractères autorisés après l'arobase (nom de domaine)
		                       
	$regex = '/^' . $atom . '+' .   // Une ou plusieurs fois les caractères autorisés avant l'arobase
	'(\.' . $atom . '+)*' .         // Suivis par zéro point ou plus
		                        // séparés par des caractères autorisés avant l'arobase
	'@' .                           // Suivis d'un arobase
	'(' . $domain . '{1,63}\.)+' .  // Suivis par 1 à 63 caractères autorisés pour le nom de domaine
		                        // séparés par des points
	$domain . '{2,63}$/i';          // Suivi de 2 à 63 caractères autorisés pour le nom de domaine

	// test de l'adresse e-mail
	if (preg_match($regex, $email)) {
	    return true;
	} else {
	    return false;
	}
}

/**************************************************************************************************************/
/******************* TEST COTÉ SERVEUR POUR L'ENVOI DU MESSAGE    *********************************************/

if (emailValide($_POST['email']) && $_POST['message'] != "" && $_POST['name'] != ""){
	$TO = "emmanuel.roy@infoartsmedia.fr";
	$subject = "Demande de mise en Relation ";
	$h  = "From: FormulaireContact@new.emmanuelroy.name";

	$message = "Bonjour,\nJe m'appelle ".$_POST['name']."\nMon adresse de courriel est : ".$_POST['email']."\n\n".$_POST['message']."\n\nCe message provient du formulaire de contact de votre site professionnel. \n(réalisation: Info[ARTS]Media)";
	
	$message .= "\n\nforeach \$_SERVER"."\n\n";
	foreach($_SERVER as $key => $value){
		$message .= "$key : $value\n";
	}
	$message .= "\n\nforeach \$_ENV"."\n\n";
	foreach($_ENV as $key => $value){
		$message .= "$key : $value\n";
	}
	
	mail($TO, $subject, $message, $h);

	if(isset($_POST['ajax'])){
		echo "Votre Message as &eacute;t&eacute; correctement transmis. Vous receverez une r&eacute;ponse dans les prochains jours.";
	}else{
		Header("Location: /contact/envoiDuMessage/oui");
	}

}else{
	if(isset($_POST['ajax'])){
		echo "Votre Message n'as pas &eacute;t&eacute; transmis. Veuillez v&eacute;rifiez les informations que vous avez saisies ...";
	}else{
		Header("Location: /contact/envoiDuMessage/non/name/".Encoding::myUrlEncode($_POST['name'])."/message/".Encoding::myUrlEncode($_POST['message'])."/email/".Encoding::myUrlEncode($_POST['email']));
	}
}
?>
