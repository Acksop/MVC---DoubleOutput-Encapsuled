
    <footer>
        <p>&copy; Unachieved <a href="http://www.evolutis.fr/">Evolutis</a> & <a href="http://www.ip-formation.com/">IP-formation</a> 2011 - develloped by Emmanuel ROY on an Debian dev2 original totally reindexed by sadness</p>
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
