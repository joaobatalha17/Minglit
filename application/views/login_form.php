<html>
<head>
	<title> Minglit </title>
	<link rel="stylesheet" href="<?php echo base_url();?>/css/style.css" type="text/css" media="screen">
	<script language=JavaScript src="<?php echo base_url();?>/javascript/jQuery.js"></script> 
	<script>
	
		function clearValue(source){
			var text = "";
			$(source).val(text);
			$(source).css("background-color","white");
		}
		
		function signUp(){
			$("#login_panel").text("");
			$("#login_panel").append("<form id='signUp_form'> </form>");
			$("signUp_form").append("<div> First Name: <input class='question_input' type='firstname' name='firstname'></div>");a
			$("#signUp_form").append("<div> Email Address: <input class='question_input' type='email' name='email'></div>");
			$("#signUp_form").append("<div> Password: <input class='question_input' type='password' name='password1'></div>");
			$("#signUp_form").append("<div> Password Check:<input class='question_input' type='password' name='password2'></div>");
			$("#signUp_form").append("<a href='#' class='mingleButton'> Create Account </a>");
		}
	</script>
	<script>
		/*will send get request to server new user sign up info
		if it is good then redirect to signin page with successful signup alert
		if not good then alert with unsuccessful signup*/
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
				
				<!when this button is pressed you need to authenticate (via ajax post) user and if not in our database return him to landing>
				<a href="#" class="mingleButton" onclick="window.location = 'questions_form.php';">Mingle >>></a>
			</form>
			<!I don't have anything made for new user signup yet, but will get on it asap'>
			New User? <a href="#" class="mingleButton" onclick="signUp()"> Sign Up</a>
		</div>
	</div>
</div>
</body>
</html>