<html>
<head>
	<title> Minglit </title>
	<link rel="stylesheet" href="<?php echo base_url();?>/css/style.css" type="text/css" media="screen">
	<script language=JavaScript src="<?php echo base_url();?>/javascript/jQuery.js"></script>
	<script>
		function connect(){
			$("p").hide();
			$(".question_input").hide();
			$(".mingleButton").hide();
			$("#question_form").hide();
			//prints Connecting ... until server sends user to game_room.php
			$("#main").append("<p id='wait'> Connecting . . .</p>");
		}
		
		function brighten(source){
			$(source).css("background-color","white");
		}
	</script>
</head>
<body>
	<div id="question_wrapper">
		<div id="main">
			<div id="login_logo">
				<img src="logo.png">
			</div>
			<form id="question_form">
				 <p>What is a fun activity you did last summer?</p>
					<input id="question1" class="question_input" type="text" name="response1" onclick="brighten('#question1')">
				 <p>How many siblings do you have?</p>
					<input id="question2" class="question_input" type="text" name="response2" onclick="brighten('#question2')"> 
				 <p>What is your favorite color?</p>
					<input id="question3" class="question_input" type="text" name="response3" onclick="brighten('#question3')">
				<div id="question_button_wrapper"><a href="#" class="mingleButton" onclick="connect()">Mingle >>></a></div>
				<!Need to post these via ajax to database when button is pressed and begin user management process>
			</form>
		</div>
	</div>
</body>
</html>
	