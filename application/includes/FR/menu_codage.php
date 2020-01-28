  <div role="main">
	<div class="container canvas">
     
    <div class="topbar">
      <div class="topbar-inner">
        <div class="container canvas">
          <a class="brand" href="<?php echo url::link_rewrite('home') ?>">Programmatique Journalistique Usuelles</a>

          <ul class="nav">
             <li class="dropdown" data-dropdown="dropdown" >
                <a href="#" class="dropdown-toggle" <?php echo ($page['name'] == 'HARDWARE-post') ? 'class="active"' : ''?>>Journalisme</a>
			    <ul class="dropdown-menu">
			      <li><a href="<?php echo url::link_rewrite('TINTERNET-chatbot') ?>">Envoi d'un lien au Chatbot Mattermost</a></li>
			      <li class="divider"></li>
			      <li><a href="#">Another link ?</a></li>
			    </ul>
            </li>
      </div>
    </div>
    <br/>
