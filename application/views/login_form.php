<html>
<head>
	<title> Minglit: Start </title>
	<link rel="stylesheet" href="<?php echo base_url();?>/css/style.css" type="text/css" media="screen">
	<script language=JavaScript src="<?php echo base_url();?>/application/javascript/jQuery.js"></script> 
	<script>
	
		function clearValue(source){
			var text = "";
			$(source).val(text);
			$(source).css("background-color","white");
		}
		
	</script>
	<script>
		//will post login input to back end		
		function login(){
			$.post(
				"<?php base_url();?>"+/*EXTENTION SHOULD BE -> "/login/validate_credentials"  */,
				{email_address: $("#email").val(), password: $("#password").val()}
			);
		}
	</script>
</head>
<body>
<div id="login_wrapper">
	<div id="main">
		<div id="login_logo">
			<img src="<?php echo base_url();?>/img/logo.png">
		</div>
		<div id="login_panel">
			<form id="login_form">
				<input class="login_input" id="email" type="text" value="Email Address" name="email" onclick="clearValue('#email')">
				<input class="login_input" id="password" type="password" value="Password" name="password" onclick="clearValue('#password')">
				<a href="#" class="mingleButton" onclick="login();">Mingle >>></a>
			</form>
			New User? <a href="#" class="mingleButton" onclick="window.location='signup_form.php"> Sign Up</a>
		</div>
	</div>
</div>
</body>
</html>