$(document).ready(
				function() {
					// your js code goes here...
					

					$("#name").focus(function() {
						//alert("focussed");
						$(this).next().css('display', 'initial');
						$(this).next().attr('class', 'info');
						$(this).next().html("Username should be unique");
						

					});

					$("#password").focus(function() {
						$(this).next().css('display', 'initial');
						$(this).next().attr('class', 'info');
						$(this).next().html("The length of the password should not be less than 8 charcters");

					});

					$("#email").focus(function() {
						$(this).next().css('display', 'initial');
						$(this).next().attr('class', 'info');
						$(this).next().html("Enter a Valid Email Id");
					});
					$("#phone").focus(function() {
						$(this).next().css('display', 'initial');
						$(this).next().attr('class', 'info');
						$(this).next().html("Phone Number contain digits only");
						

					});

					$("#name").blur(function() {
						var username=$('#name').val();
						$.ajax({
							
		 url: "validate_user.php",
		 type: "post",
		 data:  'name=' + username,
		 
		 success: function(response) {
			//alert(response);
		    if(response == "ok"){
				//$("#name").html("");
				//$(this).next().html("OK");		
	 		}
			else {
				alert("username already exists");
			}
		 },
		
     });
						
					});

					$("#password").blur(function() {

						if (($(this).val()).length == 0) {
							$(this).next().css('display', 'none');
						} else if (($(this).val()).length < 8) {
							$(this).next().attr('class', 'error');
							$(this).next().html("Error");
						} else {
							$(this).next().attr('class', 'ok');
							$(this).next().html("OK");
						}

					});

					$("#email").blur(function() {

						var check = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/
						if (($(this).val()).length == 0) {
							$(this).next().css('display', 'none');
						} else if (!check.test($(this).val())) {
							$(this).next().attr('class', 'error');
							$(this).next().html("Error");
						} else {
							$(this).next().attr('class', 'ok');
							$(this).next().html("OK");
						}

					});
						$("#phone").blur(function() {

						var check = /^[0-9]{3}[0-9]{3}[0-9]{4}$/
						if (($(this).val()).length == 0) {
							$(this).next().css('display', 'none');
						} else if (!check.test($(this).val())) {
							$(this).next().attr('class', 'error');
							$(this).next().html("Error");
						}
							else if (($(this).val()).length < 10) {
							$(this).next().attr('class', 'error');
							$(this).next().html("Phone number should be 10 digits");						
						}else {
							$(this).next().attr('class', 'ok');
							$(this).next().html("OK");
						}

					});

				});
