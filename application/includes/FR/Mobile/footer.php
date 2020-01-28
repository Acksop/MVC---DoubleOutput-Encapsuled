
    <footer id='footer-menu'>
    <div class="subfooterbar" >
      <div class="subfooterbar-inner">
        <div class="container canvas">
        <ul class='nav'>
        	<a href="<?php echo url::link_rewrite('contact'); ?>">Livre d'or</li>
        	<a href="<?php echo url::link_rewrite('contact'); ?>">Book d'images</li>
        	<a href="<?php echo url::link_rewrite('contact'); ?>">Produits immatériels</li>
        	<a href="<?php echo url::link_rewrite('contact'); ?>">Produits matériels</li>
        </ul>
        </div>
       </div>
      </div>
    </footer>
    

  <!-- JavaScript at the bottom for fast page loading -->

    <?php
    if(isset($bottomExternalJS)){
	  	foreach($bottomExternalJS as $value){
	  		echo "<script type='text/javascript' src='/$value.js'></script>"."\n ";
	  	}
  	}
  	?>

  <!-- end scripts -->
	<?php
	if(isset($bottomScriptJS)){
	  	foreach($bottomScriptJS as $value){
	  		echo "<script type='text/javascript'>$value</script>"."\n ";
	  	}
	}
  	?>
  
</body>
</html>
