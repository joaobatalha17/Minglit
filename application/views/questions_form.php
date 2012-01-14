<html>
<head>
	<title> Minglit: Questions </title>
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
	<script>
		function connect(){
			$("p").hide();
			$(".question_input").hide();
			$(".mingleButton").hide();
			$("#question_form").hide();
			//prints Connecting ... until server sends user to game_room.php
			$("#main").append("<p id='wait'> Connecting . . .</p>");
		}
		
		function clearValue(source){
			var text = "";
			$(source).val(text);
			$(source).css("background-color","white");
		}
	</script>
</head>
<body>
	<div id="question_wrapper">
		<div id="main">
			<div id="login_logo">
				<img src="<?php echo base_url() . 'img/logo.png';?>" />
			</div>
			<form id="question_form" method="post" accept-charset="utf-8" action="<?php echo base_url() . 'index.php/game/submit_questions'; ?>">

				 <p>What is a fun activity you did last summer?</p>
					<input id="question1" class="question_input" type="text" name="answer1" onclick="clearValue('#question1')" />
				 <p>How many siblings do you have?</p>
					<input id="question2" class="question_input" type="text" name="answer2" onclick="clearValue('#question2')" /> 
				 <p>What is your favorite color?</p>
					<input id="question3" class="question_input" type="text" name="answer3" onclick="clearValue('#question3')" />
				<div id="question_button_wrapper"><input type="submit" name="submit" class="mingleButton" onclick="connect()" value="Mingle >>>" /></div>
			</form>
		</div>
	</div>
</body>
</html>
	