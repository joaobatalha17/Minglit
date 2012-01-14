<html>
<head>
	<title> Minglit: Questions </title>
	<link rel="stylesheet" href="<?php echo base_url();?>/css/style.css" type="text/css" media="screen">
	<script language=JavaScript src="<?php echo base_url();?>/javascript/jQuery.js"></script>
	<script>
		function connect(){
			$("p").hide();
			$(".question_input").hide();
			$(".mingleButton").hide();
			$("#question_form").hide();
			$.post(
				"<?php base_url();?>"+/*some_extension*/,
				{activity: $("#question1").val(), siblings: $("#question2").val(), color: $("#question3").val()}
			);
			
			//prints Connecting ... until server sends user to game_room.php
			$("#main").append("<p id='wait'> Connecting . . .</p>");
		}
		
		function clearValue(source){
			var text = "";
			$(source).val(text);
			$(source).css("background-color","white");
		}
	</script>
	<script>
	
	
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
					<input id="question1" class="question_input" type="text" name="response1" onclick="clearValue('#question1')">
				 <p>How many siblings do you have?</p>
					<input id="question2" class="question_input" type="text" name="response2" onclick="clearValue('#question2')"> 
				 <p>What is your favorite color?</p>
					<input id="question3" class="question_input" type="text" name="response3" onclick="clearValue('#question3')">
				<div id="question_button_wrapper"><a href="#" class="mingleButton" onclick="connect()">Mingle >>></a></div>
			</form>
		</div>
	</div>
</body>
</html>
	