<html>
<head>
	<title> Minglit: Sign Up </title>
	<link rel="stylesheet" href="<?php echo base_url();?>/css/style.css" type="text/css" media="screen">
	<script language=JavaScript src="<?php echo base_url();?>/application/javascript/jQuery.js"></script>
</head>
<body>
<div id="login_wrapper">
	<div id="main">
		<div id="login_logo">
			<img src="<?php echo base_url();?>/img/logo.png">
		</div>
		<div id="login_panel">
			<form id='signUp_form'> 
				<div> First Name: <input id='firstname' class='question_input'></div>
				<div> Last Name: <input id='lastname' class='question_input'></div>
				<div> Email Address: <input id='email' class='question_input'></div>
				<div> Password: <input type="password" id='psswd1' class='question_input'></div>
				<div> Confirm Password: <input type="password" id='psswd2' class='question_input'></div>
				<a href='#' class='mingleButton' onclick='create_account();'> Create Account </a>
			</form>
		</div>
	</div>
</div>
</body>
</html>