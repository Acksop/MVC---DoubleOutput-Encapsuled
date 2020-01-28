var ECMAconsole = new xConsole();

function init_ECMAconsole(){
	if (ECMAconsole.MZ == true) {
		document.addEventListener('keydown', ECMAconsole.ToucheBas, true);
		document.addEventListener('keyup', ECMAconsole.ToucheHaut, true);
	} else {
		document.onkeydown = ECMAconsole.ToucheBas;
		document.onkeyup = ECMAconsole.ToucheHaut;
	}
	ECMAconsole.blocAffichage.innerHTML = '>ECMA_console_on -- Enter what you want:<br />&nbsp;<br />&gt;_';
	
	setInterval(function(){ECMAconsole.curseur_clignotement();},2000);
}

function xConsole() {
	this.majuscule;
	this.blocAffichage = document.querySelector("#curriculum");
	this.IE = this.MZ = false;
	if (document.all) {
		this.IE = true;
	} else if (document.getElementByID) {
		this.MZ = true;
	}
	
}

xConsole.prototype.curseur_clignotement = function(){
	var codeBlocAffichage;
	var texteComplet = ECMAconsole.blocAffichage.innerHTML;
	if (texteComplet.charAt(texteComplet.length-1) == '_'){
		codeBlocAffichage = ECMAconsole.changerCurseur(' ');
	}else{
		codeBlocAffichage = ECMAconsole.changerCurseur('_');
	}
	ECMAconsole.blocAffichage.innerHTML = codeBlocAffichage;
}

xConsole.prototype.changerCurseur = function(fin){
	var texteComplet = this.blocAffichage.innerHTML;
	var texte = '';
	for ( i=0 ; i<(texteComplet.length - 1) ; i++){
		texte += texteComplet[i];
	}
	texte += fin;
	return texte;
}
xConsole.prototype.GetCaractere = function(CodeClavier) {
	if (CodeClavier == 37)
		return "gauche";
	if (CodeClavier == 38)
		return "haut";
	if (CodeClavier == 39)
		return "droite";
	if (CodeClavier == 40)
		return "bas";
	if (CodeClavier == 16)
		return "shift";
	if (CodeClavier == 32)
		return "espace";
	if (CodeClavier == 13)
		return "enter";
	if (CodeClavier == 65)
		return "a";
	if (CodeClavier == 66)
		return "b";
	if (CodeClavier == 67)
		return "c";
	if (CodeClavier == 68)
		return "d";
	if (CodeClavier == 69)
		return "e";
	if (CodeClavier == 70)
		return "f";
	if (CodeClavier == 71)
		return "g";
	if (CodeClavier == 72)
		return "h";
	if (CodeClavier == 73)
		return "i";
	if (CodeClavier == 74)
		return "j";
	if (CodeClavier == 75)
		return "k";
	if (CodeClavier == 76)
		return "l";
	if (CodeClavier == 77)
		return "m";
	if (CodeClavier == 78)
		return "n";
	if (CodeClavier == 79)
		return "o";
	if (CodeClavier == 80)
		return "p";
	if (CodeClavier == 81)
		return "q";
	if (CodeClavier == 82)
		return "r";
	if (CodeClavier == 83)
		return "s";
	if (CodeClavier == 84)
		return "t";
	if (CodeClavier == 85)
		return "u";
	if (CodeClavier == 86)
		return "v";
	if (CodeClavier == 87)
		return "w";
	if (CodeClavier == 88)
		return "x";
	if (CodeClavier == 89)
		return "y";
	if (CodeClavier == 90)
		return "z";
		
	//pave numerique
	if (CodeClavier == 96)
		return "0";
	if (CodeClavier == 97)
		return "1";
	if (CodeClavier == 98)
		return "2";
	if (CodeClavier == 99)
		return "3";
	if (CodeClavier == 100)
		return "4";
	if (CodeClavier == 101)
		return "5";
	if (CodeClavier == 102)
		return "6";
	if (CodeClavier == 103)
		return "7";
	if (CodeClavier == 104)
		return "8";
	if (CodeClavier == 105)
		return "9";
	if (CodeClavier == 164)
		return "$";
	if (CodeClavier == 170)
		return "*";
	if (CodeClavier == 164)
		return "$";
	if (CodeClavier == 164)
		return "$";
	if (CodeClavier == 164)
		return "$";
	if (CodeClavier == 160)
		return "^";
	if (CodeClavier == 165)
		return "ù";
	if (CodeClavier == 188)
		return ",";
	if (CodeClavier == 59)
		return ";";
	if (CodeClavier == 58)
		return ":";
	if (CodeClavier == 161)
		return "!";
	if (CodeClavier == 60)
		return "<";
	if (CodeClavier == 49)
		return "&";
	if (CodeClavier == 50)
		return "é";
	if (CodeClavier == 51)
		return '"';
	if (CodeClavier == 52)
		return "'";
	if (CodeClavier == 53)
		return "(";
	if (CodeClavier == 54)
		return "-";
	if (CodeClavier == 55)
		return "è";
	if (CodeClavier == 56)
		return "_";
	if (CodeClavier == 57)
		return "ç";
	if (CodeClavier == 48)
		return "$";
	if (CodeClavier == 169)
		return ")";
	if (CodeClavier == 61)
		return "=";
	//alert( CodeClavier );

	return null;
}	
xConsole.prototype.ajouterCaractere = function(char){
	var texteComplet = this.blocAffichage.innerHTML;
	var texte = '';
	for ( i=0 ; i<(texteComplet.length - 1) ; i++){
		texte += texteComplet[i];
	}
	texte += char + "_";
	this.blocAffichage.innerHTML = texte;
	return;
}
			
xConsole.prototype.ToucheBas = function(e){
		var nav = (this.IE) ? ECMAconsole.GetCaractere(event.keyCode) : ECMAconsole.GetCaractere(e.which);
		if (nav == null)
			return;
		if (nav == "shift"){
			this.majuscule = true;
		}
		if (nav == "a") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("A");	
			}else{
				ECMAconsole.ajouterCaractere("a");
			}
		}
		if (nav == "b") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("B");	
			}else{
				ECMAconsole.ajouterCaractere("b");
			}
		}
		if (nav == "c") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("C");	
			}else{
				ECMAconsole.ajouterCaractere("c");
			}
		}
		if (nav == "d") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("D");	
			}else{
				ECMAconsole.ajouterCaractere("d");
			}
		}
		if (nav == "e") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("E");	
			}else{
				ECMAconsole.ajouterCaractere("e");
			}
		}
		if (nav == "f") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("F");	
			}else{
				ECMAconsole.ajouterCaractere("f");
			}
		}
		if (nav == "g") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("G");	
			}else{
				ECMAconsole.ajouterCaractere("g");
			}
		}
		if (nav == "h") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("H");	
			}else{
				ECMAconsole.ajouterCaractere("h");
			}
		}
		if (nav == "i") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("I");	
			}else{
				ECMAconsole.ajouterCaractere("i");
			}
		}
		if (nav == "j") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("J");	
			}else{
				ECMAconsole.ajouterCaractere("j");
			}
		}
		if (nav == "k") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("K");	
			}else{
				ECMAconsole.ajouterCaractere("k");
			}
		}
		if (nav == "l") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("L");	
			}else{
				ECMAconsole.ajouterCaractere("l");
			}
		}
		if (nav == "m") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("M");	
			}else{
				ECMAconsole.ajouterCaractere("m");
			}
		}
		if (nav == "n") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("N");	
			}else{
				ECMAconsole.ajouterCaractere("n");
			}
		}
		if (nav == "o") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("O");	
			}else{
				ECMAconsole.ajouterCaractere("o");
			}
		}
		if (nav == "p") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("P");	
			}else{
				ECMAconsole.ajouterCaractere("p");
			}
		}
		if (nav == "q") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("Q");	
			}else{
				ECMAconsole.ajouterCaractere("q");
			}
		}
		if (nav == "r") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("R");	
			}else{
				ECMAconsole.ajouterCaractere("r");
			}
		}
		if (nav == "s") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("S");	
			}else{
				ECMAconsole.ajouterCaractere("s");
			}
		}
		if (nav == "t") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("T");	
			}else{
				ECMAconsole.ajouterCaractere("t");
			}
		}
		if (nav == "u") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("U");	
			}else{
				ECMAconsole.ajouterCaractere("u");
			}
		}
		if (nav == "v") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("V");	
			}else{
				ECMAconsole.ajouterCaractere("v");
			}
		}
		if (nav == "w") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("W");	
			}else{
				ECMAconsole.ajouterCaractere("w");
			}
		}
		if (nav == "x") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("X");	
			}else{
				ECMAconsole.ajouterCaractere("x");
			}
		}
		if (nav == "y") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("Y");	
			}else{
				ECMAconsole.ajouterCaractere("y");
			}
		}
		if (nav == "z") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("Z");	
			}else{
				ECMAconsole.ajouterCaractere("z");
			}
		}
			
	}
xConsole.prototype.ToucheHaut = function(e){
		var nav = (this.IE) ? ECMAconsole.GetCaractere(event.keyCode) : ECMAconsole.GetCaractere(e.which);
		if (nav == null)
			return;
		if (nav == "shift"){
			this.majuscule = false;
		}
		if (nav == "enter"){
			ECMAconsole.ajouterCaractere("<br />");
		}
		if (nav == "espace"){
			ECMAconsole.ajouterCaractere("&nbsp;");
		}
		if (nav == "&") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("1");	
			}else{
				ECMAconsole.ajouterCaractere("&");
			}
		}
		if (nav == "é") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("2");	
			}else{
				ECMAconsole.ajouterCaractere("é");
			}
		}
		if (nav == '"') {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere('"');	
			}else{
				ECMAconsole.ajouterCaractere("3");
			}
		}
		if (nav == "'") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("'");	
			}else{
				ECMAconsole.ajouterCaractere("4");
			}
		}
		if (nav == "(") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("(");	
			}else{
				ECMAconsole.ajouterCaractere("5");
			}
		}
		if (nav == "-") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("-");	
			}else{
				ECMAconsole.ajouterCaractere("6");
			}
		}
		if (nav == "è") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("è");	
			}else{
				ECMAconsole.ajouterCaractere("7");
			}
		}
		if (nav == "_") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("_");	
			}else{
				ECMAconsole.ajouterCaractere("8");
			}
		}
		if (nav == "ç") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("ç");	
			}else{
				ECMAconsole.ajouterCaractere("9");
			}
		}
		if (nav == "à") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("à");	
			}else{
				ECMAconsole.ajouterCaractere("0");
			}
		}
		if (nav == ")") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere(")");	
			}else{
				ECMAconsole.ajouterCaractere("°");
			}
		}
		if (nav == "=") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("+");	
			}else{
				ECMAconsole.ajouterCaractere("=");
			}
		}
		if (nav == "<") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere(">");	
			}else{
				ECMAconsole.ajouterCaractere("<");
			}
		}
		if (nav == ",") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("?");	
			}else{
				ECMAconsole.ajouterCaractere(",");
			}
		}
		if (nav == ";") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere(".");	
			}else{
				ECMAconsole.ajouterCaractere(";");
			}
		}
		if (nav == ":") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("/");	
			}else{
				ECMAconsole.ajouterCaractere(":");
			}
		}
		if (nav == "!") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("§");	
			}else{
				ECMAconsole.ajouterCaractere("!");
			}
		}
		if (nav == "ù") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("%");	
			}else{
				ECMAconsole.ajouterCaractere("ù");
			}
		}
		if (nav == "*") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("µ");	
			}else{
				ECMAconsole.ajouterCaractere("*");
			}
		}
		if (nav == "^") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("¨");	
			}else{
				ECMAconsole.ajouterCaractere("^");
			}
		}
		if (nav == "$") {
			if (this.majuscule){
				ECMAconsole.ajouterCaractere("£");	
			}else{
				ECMAconsole.ajouterCaractere("$");
			}
		}
	}
