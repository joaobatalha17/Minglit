<html>
<head>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
	<title> Minglit: Start </title>
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen">
	
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
			<img src="<?php echo base_url() . 'img/logo.png';?>" />
		</div>
		<div id="login_panel">
			<form id="login_form" method="post" accept-charset="utf-8" action="<?php echo base_url() . 'index.php/login/validate_credentials'; ?>" >
				<input class="login_input" id="email" type="text" value="Email Address" name="email_address" onclick="clearValue('#email')"/>
				<input class="login_input" id="password" type="password" value="Password" name="password" onclick="clearValue('#password')"/>
				<input id="submit_login_button" type="submit" name="submit" value="Mingle>>>" class="mingleButton"/>
			</form>
			New User? <a href="<?php echo base_url() . 'index.php/login/signup'; ?>" class="mingleButton">Sign Up</a>
		</div>
	</div>
</div>
</body>
</html>