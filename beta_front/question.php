<html>
<head>
	<title> Minglit </title>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen">
	<script language=JavaScript src="jQuery.js"></script>
	<script>
		function connect(){
			$("p").hide();
			$(".question_input").hide();
			$(".mingleButton").hide();
			$("#question_form").hide();
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
				<div id="button_wrapper"><a href="#" class="mingleButton" onclick="connect()">Mingle >>></a></div>
			</form>
		</div>
	</div>
</body>
</html>