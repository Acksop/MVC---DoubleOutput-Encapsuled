
    <footer>

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
