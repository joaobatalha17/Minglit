<html>
<head>
	<title> Minglit: Sign Up </title>
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
	<script>
	
		function clearValue(source){
			var text = "";
			$(source).val(text);
			$(source).css("background-color","white");
		}
		
	</script>
</head>
<body>
<div id="login_wrapper">
	<div id="main">
		<div id="login_logo">
			<img src="<?php echo base_url();?>img/logo.png"/>
		</div>
		<div id="signup_box">
			<div id="signup_labels">
				<div> First Name: </div>
				<div> Last Name: </div>
				<div> Email Address: </div>
				<div>Password: </div>
				<div>Confirm Password: </div>
			</div>
				<form id='signUp_form'  method="post" accept-charset="utf-8" action="<?php echo base_url() . 'index.php/login/create_member'; ?>" > 
					<input id='firstname' class='question_input' name="first_name" onclick="clearValue('#firstname')"/>
					<input id='lastname' class='question_input' name="last_name" onclick="clearValue('#lastname')"/>
					<input id='email' class='question_input' name="email_address" onclick="clearValue('#email')"/>
					<input type="password" id='psswd1' name="password" class='question_input' onclick="clearValue('#psswd1')"/>
					<input type="password" id='psswd2' name="password2" class='question_input' onclick="clearValue('#psswd2')"/>
					<input type="submit" name="submit" class='mingleButton' value="Create Account"/>
			</form>
		</div>
		<?php echo validation_errors('<p class="error">'); ?>
	</div>
</div>
</body>
</html>