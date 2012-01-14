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
		
		function make_signup(){
			$("#login_panel").text("");
			$("#login_panel").append("<form id='signUp_form'> </form>");
			$("#signUp_form").append("<div> First Name: <input id='firstname' class='question_input'></div>");
			$("#signUp_form").append("<div> Last Name: <input id='lastname' class='question_input'></div>");
			$("#signUp_form").append("<div> Email Address: <input id='email' class='question_input'></div>");
			$("#signUp_form").append("<div> Password: <input id='psswd1' class='question_input'></div>");
			$("#signUp_form").append("<div> Password Check:<input id='psswd2' class='question_input'></div>");
			$("#signUp_form").append("<a href='#' class='mingleButton' onclick='create_account();'> Create Account </a>");
		}
	</script>
	<script>
		/*will send get request to server with new user sign up info
		if it is good then redirect to signin page with successful signup alert
		if not good then alert with unsuccessful signup*/
		
		function create_account(){
			$.post(
				"<?php base_url();?>"/*some extention*/,
				{firstname: $("#firstname").val(), lastname: $("#lastname").val(), email: $("#email").val(),psswd1: $("#psswd1").val(), psswd2: $("#psswd2").val()},
				function (data){
					if (data = "success"){
						alert("Sign in was successful! Enjoy!")
						window.location = 'login_form.php';
					}
					else{
						alert("Unsuccessful signup, please fill in all fields and try again.")
					}
				}
			);
		}
		
		/*will send get request to server with login info
		if it is good then redirect to question_form.php
		if not good then alert with unsuccessful signup*/
		
		function login(){
			$.post(
				"<?php base_url();?>"+/*EXTENTION SHOULD BE -> "/login/validate_credentials"  */,
				{email_address: $("#email").val(), password: $("#password").val()},
				function (data){
					if (data = "success"){
						window.location = 'question_form.php';
					}
					else{
						alert("Unsuccessful login.")
					}
				}
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
			New User? <a href="#" class="mingleButton" onclick="make_signup()"> Sign Up</a>
		</div>
	</div>
</div>
</body>
</html>