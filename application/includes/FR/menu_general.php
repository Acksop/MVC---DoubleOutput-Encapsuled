  <div role="main">
	<div class="container canvas">
     
    <div class="topbar" data-scrollspy="scrollspy">
      <div class="topbar-inner">
        <div class="container canvas">
          <a class="brand" href="<?php echo url::link_rewrite('CV-curriculum') ?>">Curriculum Vitae</a>

          <ul class="nav">
            <li <?php echo $page['name'] == 'contact' ? 'class="active"' : ''?> >
            <a href="<?php echo url::link_rewrite('contact') ?>">Contact</a>
            </li>
            <li <?php echo $page['name'] == 'guestbook' ? 'class="active"' : ''?> >
            <a href="<?php
            			//echo url::link_rewrite('guestbook', array('page' => 0));
            			echo "/guestbook/guestbook?page=1/guestbook-before?page=2/guestbook-after?page=3";
            		 ?>">Livre d'or</a>
            </li>
            <li <?php echo $page['name'] == 'album' ? 'class="active"' : ''?> >
            <a href="<?php echo url::link_rewrite('album',array('Repertoire' => 'album')) ?>">Book d'Images</a>
            </li>
			<li <?php echo $page['name'] == 'BOUTIQUE-1tpe' ? 'class="active"' : ''?> >
            <a href="http://boutic.acksop.1tpe.fr/">Produits Immatériels</a>
            </li>
            <li <?php echo $page['name'] == 'BOUTIQUE-priceminister' ? 'class="active"' : ''?> >
            <a href="https://fr.shopping.rakuten.com/boutique/roymanu">Produits Matériels</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <br/>
