  <div role="main">
	<div class="container canvas">
     
    <div class="topbar" >
      <div class="topbar-inner">
        <div class="container canvas">
          <a class="brand" style='background: steelblue;' href="<?php echo url::link_rewrite('home') ?>">Curriculum Vitae</a>

          <ul class="nav">
            <li <?php echo $page['name'] == 'contact' ? 'class="active"' : ''?> >
            <a href="<?php echo url::link_rewrite('contact') ?>">Contact</a>
            </li>
            <li <?php echo $page['name'] == 'guestbook' ? 'class="active"' : ''?> >
            <a href="<?php
            			//echo url::link_rewrite('guestbook', array('page' => 0));
            			echo "/guestbook?page=2/guestbook-before?page=1/guestbook-after?page=3";
            		 ?>">Livre d'or</a>
            </li>
            <li <?php echo $page['name'] == 'album' ? 'class="active"' : ''?> >
            <a href="<?php echo url::link_rewrite('album',array('Repertoire' => 'album')) ?>">Book d'Images</a>
            </li>
			<li <?php echo $page['name'] == 'BOUTIQUE-1tpe' ? 'class="active"' : ''?> >
            <a href="<?php echo url::link_rewrite('BOUTIQUE-1tpe') ?>">Produits Immatériels</a>
            </li>
            <!-- <li <?php echo $page['name'] == 'BOUTIQUE-priceminister' ? 'class="active"' : ''?> >
            <a href="<?php echo url::link_rewrite('BOUTIQUE-Priceminister') ?>">Produits Matériels</a>
            </li>-->
          </ul>
        </div>
      </div>
    </div>
    <br/>
    
        <!-- Topbar
    ================================================== -->
    <div class="diagonal-fill"><br />&nbsp;<br />&nbsp;<br />&nbsp;</div>
    <div class="subtopbar" data-scrollspy="scrollspy" >
      <div class="fill">
        <div class="container canvas">
          <ul>
            <li><a href="#information">Information</a></li>
            <li><a href="#formation">Education</a></li>
            <li><a href="#entreprise">Expérience</a></li>
            <li><a href="#developpement">Developpement</a></li>
            <li><a href="#auto-entrepreneuriat">Auto-entrepreneur</a></li>
            <li><a href="#love">Coding </a></li>
            <li><a href="#personnal">Compétences</a></li>
          </ul>
        </div>
      </div>
    </div>
