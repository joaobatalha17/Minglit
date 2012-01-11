<html>
<head>
	<title> Minglit </title>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen">
	<script language=JavaScript src="jQuery.js"></script> 
	<script>
	
		function clearValue(source){
			var text = "";
			$(source).val(text);
			$(source).css("background-color","white");
		}
		
		function signUp(){
			$("#login_panel").text("");
			$("#login_panel").append("<form id='signUp_form'> </form>");
			$("#signUp_form").append("<div> Email Address: <input class='question_input' type='email' name='email'></div>");
			$("#signUp_form").append("<div> Password: <input class='question_input' type='password' name='password1'></div>");
			$("#signUp_form").append("<div> Password Check:<input class='question_input' type='password' name='password2'></div>");
			$("#signUp_form").append("<a href='#' class='mingleButton'> Create Account </a>");
		}
	</script>
	
</head>
<body>
		<div id="login_wrapper">
			<div id="main">
				<div id="login_logo">
					<img src="logo.png">
				</div>
				<div id="login_panel">
					<form id="login_form">
						<input class="login_input" id="email" type="text" value="Email Address" name="email" onclick="clearValue('#email')">
						<input class="login_input" id="password" type="password" value="Password" name="password" onclick="clearValue('#password')">
						<a href="#" class="mingleButton" onclick="window.location = 'question.php';">Mingle >>></a>
					</form>
					New User? <a href="#" class="mingleButton" onclick="signUp()"> Sign Up</a>
				</div>
			</div>
		</div>
	
</body>
</html>