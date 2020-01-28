  <div role="main">
	<div class="container canvas">
     
    <div class="topbar">
      <div class="topbar-inner">
        <div class="container canvas">
          <a class="brand" href="<?php echo url::link_rewrite('home') ?>">Curriculum Vitae</a>

          <ul class="nav">
            <li <?php echo $page['name'] == 'contact' ? 'class="active"' : ''?> >
            <a href="<?php echo url::link_rewrite('contact') ?>">Contact</a>
            </li>
            <li>
            <a href="#footer-menu">&equiv;</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <br/>
