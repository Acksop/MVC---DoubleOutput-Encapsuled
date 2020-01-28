var itx = [0,0,0];
			function validationContact()
			{
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
 
        		var emailaddressVal = $("#email").val();
        		if(emailaddressVal == '') {
				if(itx[0] == 0){
						$("#email_label").html('<span class="error">Please, Enter a valid email address.</span>');
					itx[0]++;
				}
        		    	return false;
        		}else if(!emailReg.test(emailaddressVal)) {
				if(itx[0] == 0){
						$("#email_label").html('<span class="error">Please, Enter a valid email address.</span>');
					itx[0]++;
				}else{
				   $("#email").css('border-color','indianRed');
				}
        		    	return false;
        		}
        		var nameaddressVal = $("#name").val();
        		if(nameaddressVal == '') {
				if(itx[1] == 0){
        			    $("#name_label").html('<span class="error">Please, Enter your real name.</span>');
    				itx[1]++;
				}else{
				   $("#name").css('border-color','indianRed');
				}
        		    	return false;
        		}
        		var messageaddressVal = $("#message").val();
        		if(messageaddressVal == '') {
				if(itx[2] == 0){
	        		    $("#message_label").after('<br /><span class="error">Please enter a message.</span>');
					itx[2]++;
				}else{
				   $("#message").css('border-color','indianRed');
				}
	        		return false;
        		}
        		//var dat = 'email='+emailaddressVal+'&name='+nameaddressVal+'&message='+messageaddressVal+'&ajax=1';
        		var dat2 = $('#contactform').serialize();
			var dat2 = dat2 + '&ajax=1';
        		//alert(dat2);
        		
        		$.ajax({
				url: $("#contactform").attr('action'),
        		     	type: $("#contactform").attr('method'),
        		     	data: dat2,
        		        success: function(html) {
					$("#contactform_success").after('<br /><p>' + html + '</p>');
        		       }
        		   });
        		return false;
			}
