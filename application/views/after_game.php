<html>
<head>
	<title> Minglit: Post Game </title>
	<link rel="stylesheet" href="style2.css" type="text/css" media="screen">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
	<script>
	function glow(){
		$("#email_field").css("background-color","white");
			}
	</script>
</head>
<body>
	
	<div id="email_panel">
		<form>
			<div id="radio_players">
				<input class="radio_buttons" type="radio" name="player"/>A  &nbsp&nbsp<input class="radio_buttons" type="radio" name="player"/>B  &nbsp&nbsp<input class="radio_buttons" type="radio" name="player"/>C  &nbsp&nbsp<input class="radio_buttons" type="radio" name="player"/>D  &nbsp&nbsp  
			</div>
			<div id="email_div">
				<textarea id="email_field" name"textfield" onclick="glow();"></textarea>
				<div id="send_email_mingleButton">
					<input id="send_email_button" class="mingleButton" type="submit" value="Send Email"/> 
				</div>
			</div>
		</form>
	</div>
	<div id="after_game_mingleButton">
		<a href="#" class="mingleButton"> Mingle >>></a>
	</div>
</body>
</html>