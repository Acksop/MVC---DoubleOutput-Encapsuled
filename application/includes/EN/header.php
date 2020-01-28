<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
<head>
  <META charset="<?php if(isset($encodage)){ echo $encodage; }else{ echo 'utf-8'; } ?>">

	<META NAME="Category" CONTENT="Curriculum Vitae Interactif et multimédia"/>
	<META NAME="Publisher" CONTENT="Emmanuel ROY"/>
	<META NAME="Copyright" CONTENT="© - 2015 - Acksop"/>
	<META NAME="Expires" CONTENT="Never Maybe!"/>
	<META NAME="Distribution" CONTENT="Global"/>
	<META NAME='Description' lang='<?php echo $lang; ?>' CONTENT="<?php echo $metaDesc ?>"/>
	<META NAME='Identifier-URL' CONTENT="new.emmanuelroy.name/<?php echo $page['name'] ?>"/>
	<?php
		if(isset($baseUrl)){
			echo "<META NAME='Source-Identifier-URL' CONTENT='from inachieved IP-formation --- PHP/MySql Certification' />";
			echo "<META NAME='Frozen-Base-URL' CONTENT='$baseUrl' />";
			echo "<META NAME='Fallback-Base-URL' CONTENT='http://FbootStrap.com' />";
		} 

	?>
	<?php
	/*Rich META from google
	<meta name="department" content="legal" />
	<meta name="audience" content="all" />
	<meta name="doc_status" content="draft" />
	//a utiliser avec un syteme de classement utilisateur
	<meta name="rating" content="5" />
	//link: http://en.wikipedia.org/wiki/Smart_tag_%28Microsoft%29
	<meta name="mssmarttagspreventparsing" content="..." />
	//link: https://support.google.com/customsearch/answer/2595557?hl=fr
	<meta name="verify-v1" content="..." />
	*/
	?>
	
	<META NAME='Keywords' lang='fr' CONTENT="Art, Programming, Languages, Personnal Website, Curriculum Vitae Multimédia"/>		
	<META NAME="Author" CONTENT="<?php if(isset($auteur)){ echo $auteur; }else { echo 'Emmanuel ROY And More'; } ?>"/>
	<META NAME="Reply-to" CONTENT="contact@emmanuelroy.name"/>
	<META NAME="Date-Creation-yyyymmdd" CONTENT="<?php echo $dateCreation ?>"/>
	<META NAME="Date-Revision-yyyymmdd" CONTENT="<?php echo $dateRevision ?>"/>
	<META NAME="Revisit-After" CONTENT="365,333333333333333333333333333... - 1 days"/>
	<META NAME="Robots" CONTENT="index, nofollow"/>
	<META NAME="GOOGLEBOT" CONTENT="NOARCHIVE"/>
	<META NAME="the-WAYBACK-MACHINE" CONTENT="ARCHIVE"/>

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/i/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php echo $title ?></title>

  <!-- Mobile viewport optimized: h5bp.com/viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

  <link rel="stylesheet" href="/css/style.css" />
  <link rel="stylesheet" href="/css/bootstrap.css" />
  <link rel="stylesheet" href="/css/docs.css" />
  <link href="/js/assets/prettify.css" rel="stylesheet"> 
  <?php 
  if(isset($stylesCSS)){
  	foreach($stylesCSS as $value){
  		echo "<link rel='stylesheet' href='/$value.css'>"."\n ";
  	}
  }
  ?>

  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->




  <!-- All JavaScript at the bottom, except this Modernizr build.
       Modernizr enables HTML5 elements & feature detects for optimal performance.
       Create your own custom Modernizr build: www.modernizr.com/download/ -->
  <script src="/js/libs/modernizr-2.5.3.min.js"></script>
  
  
    <script src="http://code.jquery.com/jquery-1.7.min.js"></script>
    <script src="/js/assets/prettify.js"></script>
    <script>$(function () { prettyPrint() })</script>
    <script src="/js/bootstrap-modal.js"></script>
    <script src="/js/bootstrap-alerts.js"></script>
    <script src="/js/bootstrap-twipsy.js"></script>
    <script src="/js/bootstrap-popover.js"></script>
    <script src="/js/bootstrap-dropdown.js"></script>
    <script src="/js/bootstrap-scrollspy.js"></script>
    <script src="/js/bootstrap-tabs.js"></script>
    <script src="/js/bootstrap-buttons.js"></script>
  
  <?php
  
  if(isset($topExternalJS)){
  	foreach($topExternalJS as $value){
  		echo "<script type='text/javascript' src='/$value.js'></script>"."\n ";
  	}
  }
  if(isset($topScriptJS)){
  	foreach($topScriptJS as $value){
  		echo "<script type='text/javascript'>$value</script>"."\n ";
  	}
  }
  ?>
</head>



<body>
 <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
