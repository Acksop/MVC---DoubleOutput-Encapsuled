# MVC---DoubleOutput---Encapsuled
---
It is an implementation of MVC--Encapsuled (https://github.com/Acksop/MVC---Encapsuled.git):

This Model-View-Controller in PHP is based on a developement initated in 2012 with IP-Formation Lyon

I have added some feature in the page controller:

- you can add css in a template by the PHP array: $stylesCSS
- you can add external js script at the top by the PHP array: $topExternalJS
- you can add internal js script at the top by the PHP array: $topScriptJS
- you can add external js script at the bottom by the PHP array: $bottomExternalJS
- you can add internal js script at the bottom by the PHP array: $bottomScriptJS

- some metadesc can be modified by passing PHP variables:
    DateCreation by $dateCreation
    DateRevision by $dateRevision
    Author by $auteur
    Description by $metaDesc
    Encoding by $encodage
- the title of the html page can be modified by the PHP variable $title
	

So the new features are:
 - translation from the browser-language
 - mobile and desk different output from the browser
