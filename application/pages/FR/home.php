<?php 
	$title = 'Curriculum Vitae';
	$metaDesc = 'CV - Emmanuel ROY ';
	$dateCreation = '20120913';
	$dateRevision = '20150517';
	$bottomExternalJS[] = 'js/whitefangs-textroll';
	
	
	$code = file(PUBLIC_PATH . DIRECTORY_SEPARATOR . 'download' . DIRECTORY_SEPARATOR . 'cv-curriculum-source.txt');
	$caracteres_vides = array(' ','.',"\t","'",'"',";","-","=","<",">","/","&",",",":","(",")");
	$code = mb_convert_encoding($code[0], 'ASCII');
	$code = str_replace('\"', '"',$code);
	$code = str_replace($caracteres_vides, "", $code);
	$lines = str_split($code,107);
	
	$bottomScriptJS[] = <<<EOD
	
	textroll.init({
		'interval' : 50, 
		'progressive' : false,
		'alphabet' : 'abcdefghijklmnopqrstuvwxyz'.split(''),
		'numbers' : '0123456789'.split(''),
		'punctuation': '"\'(-),?;.:!'.split(''),
		'spaceCorpus' : 'punctuation',
		'changeCase' : 'beginning'
	});
	var element = document.querySelector("#curriculum");
			
	setTimeout(function(){
		element.style = 'transform:rotate(2deg);';
	}, 8500);
			
	setTimeout(function(){
			element.style = 'font-family:courier new, deja-vu; width:750px;';
	}, 9500);
			
	setTimeout(function(){
		textroll.replace(element,
EOD;

	foreach($lines as $key =>$value){
		$value = str_replace('"','\"',$value);
		$bottomScriptJS[0] .= '"'.$value.'<br />" + ' . "\n";
		if($key == 34) break;
	}		
			
	$bottomScriptJS[0] .= <<<EOD
	"")}, 10000);
	
		
	function CharAleatoire(){
		var ListeChar = new Array('a' , 'z' , 'e' , 'r' , 't' , 'y' , 'u' , 'i' , 'o' , 'p' , 'q' , 's' , 'd' , 'f' , 'g' , 'h' , 'j' , 'k' , 'l' , 'm' , 'w' , 'x' , 'c' , 'v' , 'b' , 'n' );
		return ListeChar[Math.floor(Math.random()*ListeChar.length)];
	}		
			
	function effacerTout(texteComplet,itx,nbCharEfface){
		var texte = '';
		for(var i=0;i < (texteComplet.length - nbCharEfface); i++){
			texte += texteComplet[i];
		}
		ECMAconsole.blocAffichage.innerHTML = texte;
		nbCharEfface = Math.trunc(itx/36);
		if ( nbCharEfface < 1 ) nbCharEfface = 1;
		if ( texte != '' ){
			itx++;
			setTimeout( "effacerTout('"+texte+"',"+itx+","+nbCharEfface+")",20 );
		}else{
			init_ECMAconsole();
		}
	}
	
EOD;

	$bottomScriptJS[] = <<<EOD
	setTimeout(function(){
			var element = document.querySelector("#curriculum");
			element.innerHTML = "" +
EOD;
	
	foreach($lines as $key => $value){
		$bottomScriptJS[1] .= '"'.$value.'<br />" + ' . "\n";
		if($key == 34) break;
	}
		
	$bottomScriptJS[1] .= <<<EOD
			"";
		var texte = ECMAconsole.blocAffichage.innerHTML;
		setTimeout("effacerTout('" + texte + "',0,4)", 200);
			
			
	}, 12500);
	
	
EOD;

	$bottomExternalJS[] = 'js/acksop-ECMAconsole';
